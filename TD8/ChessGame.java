import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.IOException;
import java.util.concurrent.TimeUnit;

/**
 * This class implements a chess game. The chess game takes place in a remote
 * server.
 * This class uses the REST API provided by the server to interact with.
 */
public class ChessGame {
	private HumainPlayer hPlayer;
	private AIPlayer aiPlayer;
	private HttpClient restClient;
	private String restServerName;
	private int restPort;
	private boolean isFinished = false;
	private String gameId = "";
	private ChessGameInterface cgi;
	private String fen = "";

	/**
	 * Creates a new Chess game over restServerName targeting restPort
	 * 
	 * @param restServerName. The name or the IP address in the String format
	 * @param restPort.       Port number used by the server
	 */
	public ChessGame(String restServerName, int restPort) {
		this.restServerName = restServerName;
		this.restPort = restPort;
		cgi = new ChessGameInterface();
		restClient = new HttpClient(restServerName, restPort, false);
	}

	/**
	 * Updates the FEN
	 */
	public void setFen(String fen) {
		this.fen = fen;
		cgi.createHtmlChessBoard(fen);
	}

	/**
	 * Get the current FEN of the game
	 */
	public String getCurrentFen() {
		return fen;
	}

	/**
	 * Initialize a HumainPlayer object.
	 */
	public void setHPlayer(String name) {
		hPlayer = new HumainPlayer(restClient, name, gameId);
	}

	/**
	 * Initialisez a AIPlayer object.
	 */
	public void setAIPlayer() {
		aiPlayer = new AIPlayer(restClient, gameId);
	}

	/**
	 * Creates a new chess game at the server.
	 * 
	 * @return a String with the JSON object containing the game ID.
	 *         in case of error, the null object should be returned
	 * @TODO This method must execute a request to the server to create a new chess
	 *       game
	 */
	private String createGameAtServer() {
		this.restClient.createReq("GET", "/api/v1/chess/one");
		String[] rep = this.restClient.sendRequest();
		if (rep[0].contains("200 OK")) {
			return rep[1];
		}
		return null;
	}

	/**
	 * initializeGame() must be called before creating the Humain and the IA Player.
	 * This method must actually create a new game on the server through the REST
	 * API.
	 */
	public void initializeGame() {
		// ask the user if it wants to play.
		String userAnswer = ChessGameInterface.mainMenu();
		if (!userAnswer.equals("S")) {
			// if not, we're leaving...
			System.out.println("Leaving!");
			System.exit(0);
		}

		// we want to play. Let's create the game on the server
		String jsonAnswer = createGameAtServer();

		// in case of error (i.e. when the server doesn't reply with "200 OK")
		// jsonAnswer ==null. So, let's leave
		if (jsonAnswer == null) {
			System.exit(-1);
		}

		// We received "200 OK". We can suppose everything is going fine
		String gameId = ChessGameInterface.getValueFromKeyJSON(jsonAnswer, "game_id");
		// we set the current gameId for this game
		setGameId(gameId);
		// we need to show the chessboard to the humain play
		// so, we start by calling retrieveFenFromServer() that will update
		// the fen attribut with the current fen
		retrieveFenFromServer();
		// fen should be updated at this point.
		// With the help of the ChessGameInterface, we create the HTML/CSS
		// chessboard
		cgi.createHtmlChessBoard(fen);
	}

	/**
	 * Updates the game ID
	 */
	private void setGameId(String gameId) {
		this.gameId = gameId;
	}

	/**
	 * Get the game ID
	 */
	private String getGameId() {
		return gameId;
	}

	/**
	 * This function must execute a request to the server to get the FEN of the
	 * game.
	 * retrieveFenFromServer() relies on ChessGameInterface.getValueFromKeyJSON() to
	 * obtain the FEN from
	 * the JSON object returned by the server.
	 * This method doesn't return anything but updates the fen attribut of this
	 * class
	 */
	private void retrieveFenFromServer() {
		this.restClient.createReq("POST", "/api/v1/chess/one/fen");
		this.restClient.addHeaderLine("Content-Type: application/x-www-form-urlencoded");
		this.restClient.addBodyData("game_id=" + this.getGameId());
		this.restClient.showFullRequest();
		System.out.println(this.getGameId());
		String[] rep = this.restClient.sendRequest();
		System.out.println(rep[0]+rep[1]);
		if (rep[0].contains("200 OK")) {
			String fen = ChessGameInterface.getValueFromKeyJSON(rep[1], "fen_string");
			setFen(fen);
		} else {
			System.out.println("Error: " + rep);
			System.exit(-2);
		}
	}

	/**
	 * When the game expires at the server, this method can be called to create a
	 * new game at the server from the last known FEN
	 */
	private void restartGame() {
		// Optional TODO !!

		// Send a request to restart the game from the last known FEN

		// Once the reply has been obtained, we need to check if we
		// received a "200 OK"
		// If so, process the reply and update the gameId for this object,
		// and for the HumainPlayer and AIPlayer objects

		// If not, write a message to the user and finish the execution
		// of the program
		return;
	}

	/**
	 * launchGame() will actually run the game. All players and the game must be
	 * created
	 * before lunching this method.
	 */
	public void launchGame() {
		while (!isFinished) {
			execHumainMove();
			updateChessBoard();
			execAIMove();
			updateChessBoard();
		}
	}

	/**
	 * Helper to update the HTML Chess Board
	 */
	private void updateChessBoard() {
		retrieveFenFromServer();
		cgi.createHtmlChessBoard(fen);
	}

	/**
	 * It must do anything to ask the user's movement (or exit):
	 * show the menu, get the user choice, execute the movement,
	 * retry if needed (e.g. in case of illegal move)
	 */
	private void execHumainMove() {
		int codeMove;
		int retries;

		do {
			// Show the app options to the user
			String hMove = ChessGameInterface.playingMenu(hPlayer.getPlayerName());
			if (hMove.equals("exit"))
				System.exit(0);

			// humain player didn't write "exit", so this players wants to play
			// we set the move to the executed on the proper HumainPlayer attribut
			hPlayer.setNextMove(hMove);
			retries = 0;

			do {
				retries++;
				// let's try to execute the mouvement
				// hPlayer.move() sends a requerst to the server to exec
				// the mouvement
				codeMove = hPlayer.move();
				// if codeMove == 0, the server successfully executed the
				// player mouvement
				if (codeMove == 0)
					return;
				// if codeMove == -1, the game expired
				// or we didn't get "200 OK"
				// so let's try to restart the game
				if (codeMove == -1)
					restartGame();
			} while (codeMove == -1 && retries < 2); // -1 = "expired" or not "200 OK"
			if (codeMove == -1) {
				System.out.println("Fatal error: unable to restart expired game");
				System.exit(-1);
			}
			if (codeMove == -2) { // -2 = "invalid move!"
				ChessGameInterface.showBadMoveMessage();
			}
		} while (codeMove == -2);
	}

	/**
	 * It must do anything for the AI to execute a mouvement.
	 * This method must execute a few retries if needed (e.g. in case of server
	 * failures)
	 */
	private void execAIMove() {
		int retries = 0;
		int codeMove = 0;
		do {
			// a little delay before a new mouvement
			// this time by the AI
			// try {
			// 	TimeUnit.SECONDS.sleep(1);
			// } catch (InterruptedException e) {
			// 	System.out.println("could'n sleep");
			// }
			retries++;
			// ask the AI mouvement on the server
			codeMove = aiPlayer.move();
			// if codeMove == 0, the server successfully executed the
			// AI mouvement
			if (codeMove == 0)
				return;
			// in case of error, we can try to restart the game
			// from the latest FEN
			restartGame();
		} while (retries < 2);
		System.out.println("Impossible to move with AI");
		System.exit(-3);
	}

	public static void main(String[] args) {
		ChessGame cg = new ChessGame("localhost", 3000);
		cg.initializeGame();
		cg.setHPlayer("Mr. DUPONT");
		cg.setAIPlayer();
		cg.retrieveFenFromServer();
		cg.launchGame();
	}

}
