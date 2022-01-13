public class AIPlayer extends Player {

	public AIPlayer(HttpClient restClient, String gameId) {
		this.restClient = restClient;
		this.gameId = gameId;
		this.playerName = "AI";
	}

	/**
	 * This method will request the server to use the AI to move a piece
	 */
	public int move() {
		this.restClient.createReq("POST", "/api/v1/chess/one/move/ai");
		this.restClient.addHeaderLine("Content-Type: application/x-www-form-urlencoded");
		this.restClient.addBodyData("gameId=" + this.gameId);
		String[] rep = this.restClient.sendRequest();
		if (rep[0].contains("200 OK") && rep[1].contains("error")) {
			System.out.println("Error: " + rep[1]);
			return -1;
		} else {
			return 0;
		}
	}

}