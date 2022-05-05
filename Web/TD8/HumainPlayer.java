public class HumainPlayer extends Player {
	private String nextMove;

	public HumainPlayer(HttpClient restClient, String playerName, String gameId) {
		this.restClient = restClient;
		this.playerName = playerName;
		this.gameId = gameId;
	}

	/**
	* This method will allow to setup the user's requested move, as the move() method receives no arguments.
	*/
	public void setNextMove(String fromTo) {
		this.nextMove = fromTo;
	}

	/**
	* This method will request the server to move a user's piece
	* @return 0 in case of success, -1 in case of server error, and
	* -2 in case of invalid move
	*/
	public int move() {
		this.restClient.createReq("POST", "/api/v1/chess/one/move/player");
		this.restClient.addHeaderLine("Content-Type: application/x-www-form-urlencoded");
		this.restClient.addBodyData("from=" + this.nextMove.substring(0, 2) + "&to=" + this.nextMove.substring(2) + "&game_id=" + this.gameId);

		String[] rep = this.restClient.sendRequest();
		if (rep[0].contains("200 OK") && rep[1].contains("error")) {
			System.out.println("Error: " + rep[1]);
			return -1;
		} else {
			if (rep[1].contains("invalid move")) {
				System.out.println("Illegal Move! Please try again.");
				return -2;
			} else {
				return 0;
			}
		}
	}

}