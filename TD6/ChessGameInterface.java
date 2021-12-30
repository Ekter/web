import java.util.*;
import java.io.*;
import org.json.JSONArray;
import org.json.JSONObject;

public class ChessGameInterface {
	HashMap<String, String> hm;

	public ChessGameInterface() {
		hm = new HashMap<String, String>();
		hm.put("r", "<td>&#9820;</td>");
		hm.put("n", "<td>&#9822;</td>");
		hm.put("b", "<td>&#9821;</td>");
		hm.put("k", "<td>&#9818;</td>");
		hm.put("q", "<td>&#9819;</td>");
		hm.put("p", "<td>&#9823;</td>");
		hm.put("R", "<td>&#9814;</td>");
		hm.put("N", "<td>&#9816;</td>");
		hm.put("B", "<td>&#9815;</td>");
		hm.put("K", "<td>&#9812;</td>");
		hm.put("Q", "<td>&#9813;</td>");
		hm.put("P", "<td>&#9817;</td>");
	}

	/**
	 * This is a helper method for createHtmlChessBoard.
	 * This method take the FEN and creates an HTML table that represent the chess
	 * board
	 *
	 * @param fen. The FEN String
	 */
	private void printChessTable(String fen, PrintWriter pw) {
		String[] rows = fen.split("/");
		String caux = "";
		for (String row : rows) {
			pw.print("<tr>");
			char[] cars = row.toCharArray();
			for (char c : cars) {
				caux = Character.toString(c);
				if (hm.containsKey(caux)) {
					pw.print(hm.get(caux));
					continue;
				}
				int n = Integer.parseInt(caux);
				for (int i = 0; i < n; i++) {
					pw.print("<td></td>");
				}
			}
			pw.println("</tr>");
		}
	}

	/**
	 * This method will create an HTML file that will represent the chess board.
	 * This method will write all constants needed by the HTML page: styles, header
	 * and footer
	 * It will call printChessTable(), which will write the dynamic part.
	 * 
	 * @param fen. The FEN String.
	 */
	public void createHtmlChessBoard(String fen) {
		String header = "<html>\n <head>\n  <meta http-equiv=\"refresh\" content=\"2\"/><style type=\"text/css\">        .chess_board { border:1px solid #333; margin-left: 40px;}        .chess_board td {            background:#fff; background:-moz-linear-gradient(top, #fff, #eee);            box-shadow:inset 0 0 0 1px #fff;            -moz-box-shadow:inset 0 0 0 1px #fff;            -webkit-box-shadow:inset 0 0 0 1px #fff;            height:40px; text-align:center; vertical-align:middle; width:40px; font-size:30px;}        .chess_board tr:nth-child(odd) td:nth-child(even),        .chess_board tr:nth-child(even) td:nth-child(odd) {            background:#ccc; background:-moz-linear-gradient(top, #ccc, #eee);            box-shadow:inset 0 0 10px rgba(0,0,0,.4);            -moz-box-shadow:inset 0 0 10px rgba(0,0,0,.4);            -webkit-box-shadow:inset 0 0 10px rgba(0,0,0,.4); }        .horizontallabels td, .verticallabels td {          height:38px;text-align:center; vertical-align:middle; width:36px; font-size:29px;        }        .horizontallabels {          padding-left: 40px;        }        .verticallabels {          float:left; width:40px;        }    </style>    </head><body>  <table class=\"verticallabels\">    <tr><td>8<td></tr>    <tr><td>7<td></tr>    <tr><td>6<td></tr>    <tr><td>5<td></tr>    <tr><td>4<td></tr>    <tr><td>3<td></tr>    <tr><td>2<td></tr>    <tr><td>1<td></tr>  </table>  <table class=\"chess_board\" cellspacing=\"0\" cellpadding=\"0\">";
		String footer = "</table><table class=\"horizontallabels\">      <tr>        <td>a</td>        <td>b</td>        <td>c</td>        <td>d</td>        <td>e</td>        <td>f</td>        <td>g</td>        <td>h</td>      </tr>    </table></body></html>";

		FileWriter fw = null;
		PrintWriter pw = null;
		try {
			fw = new FileWriter("/tmp/jeu.html");
			pw = new PrintWriter(fw);
			pw.println(header);
			if (fen == null || fen.isEmpty())
				printChessTable("8/8/8/8/8/8/8/8", pw);
			else
				printChessTable(fen.split(" ")[0], pw);
			pw.println(footer);
			pw.close();
			fw.close();
		} catch (IOException e) {
			System.out.println("Problems with file");
		}
	}

	/**
	 * Just a helper to parse a JSON Object. It gives the String value associated to
	 * a key.
	 * The value we're looking for must be a String!
	 *
	 * @param json.    The JSON Object in String format
	 * @param jsonkey. The JSON key we are intested in.
	 * 
	 * @return the value associated to the key.
	 */
	public static String getValueFromKeyJSON(String json, String jsonkey) {
		JSONObject obj = new JSONObject(json);
		return obj.getString(jsonkey);
	}

	public static void jsonParser(JSONObject jo, int level) {
		for (String key : jo.keySet()) {
			Object value = jo.get(key);
			if (value instanceof JSONObject) {
				System.out.println(" ".repeat(level) + "Object " + key + " :");
				jsonParser((JSONObject) value, level + 1);
			} else if (value instanceof JSONArray) {
				System.out.println(" ".repeat(level) + "Array " + key + " :");
				jsonArrayParser((JSONArray) value, level + 1);
			} else if (value instanceof String) {
				System.out.println(" ".repeat(level) + "String " + key + " : " + value);
			}else{
					System.out.println(" ".repeat(level) + "String " + key + " : " + value.toString());
			}
		}
	}

	public static void jsonParser(JSONObject jo) {
		jsonParser(jo, 0);
	}

	public static void jsonArrayParser(JSONArray ja, int level) {
		for (int i = 0; i < ja.length(); i++) {
			Object object = ja.opt(i);
			if (object instanceof JSONObject) {
				System.out.println(" ".repeat(level) + "Object :");
				jsonParser((JSONObject) object, level + 1);
			} else if (object instanceof JSONArray) {
				System.out.println(" ".repeat(level) + "Array :");
				jsonArrayParser((JSONArray) object, level + 1);
			} else if (object instanceof String) {
				System.out.println(" ".repeat(level) + "String : " + object);
			}else{
				System.out.println(" ".repeat(level) + "Other : " + object.toString());
			}
		}
	}

	public static void main(String[] args) {
		ChessGameInterface cgi = new ChessGameInterface();
		String fen = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
		if (args.length == 1)
			fen = args[0];
		cgi.createHtmlChessBoard(fen);
		String json = "{\"id\":\"123456\",\"var1\":\"val1\"}";
		String jsonkey = "id";
		JSONObject jo = new JSONObject(json);
		System.out.println(getValueFromKeyJSON(json, jsonkey));
		jsonParser(jo);
		// String betterJson = "{\"id\":\"123456\",\"tab1\":[\"item1\", \"item2\"]}";
		String betterJson = "{\"a\":\"b\",\"b\":{\"c\":\"d\",\"e\":\"f\"},\"g\":[\"h\",\"i\",{\"b\":{\"c\":\"d\",\"e\":\"f\"}},{\"cours\":[{\"id_cours\": \"123456789A\",\"nom_cours\": \"arts-plasiques\",\"nombre_participants\": 0,\"facultatif\": true},{\"id_cours\": \"123456789B\",\"nom_cours\": \"peinture\",\"nombre_participants\": 100,\"facultatif\": false}]}]}";
		JSONObject betterJo = new JSONObject(betterJson);
		jsonParser(betterJo);
		// System.out.println("La valeur associée à la clé " + jsonkey + "est : " +
		// cgi.getValueFromKeyJSON(json,jsonkey));
	}
}