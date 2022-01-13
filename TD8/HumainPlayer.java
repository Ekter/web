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
		//TODO: ask the server to move a HumainPlayer piece
		// remember, the movement stored in "nextMove" looks like "a2a3"
		
		//Once the reply has been obtained, we need to check if we
		//received a "200 OK"
		//If not, return à -1
		//If it is a "200 OK" but the JSON object contains
		// * "expired", then return -1
		// * "invalid move", return -2

		// in all other cases, return 0 (success code)
		return 0;
	}

}