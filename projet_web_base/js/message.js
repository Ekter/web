window.onload = function() {
    // récupérer l'élément textarea d'id message_content
    let textarea = document.getElementById("message_content");
    // le bouton 'save'
    let sendButton = document.createElement("input");
    sendButton.type = "button";
    sendButton.value = "Send message";
    // le bouton 'cancel'
    // ici, on emboîte les éléments les uns dans les autres
    document.getElementById("form_msg").appendChild(sendButton);
    sendButton.onclick = send_message;

    function send_message() {
        // console.log(textarea.value);
        simpleAjax("message.php", "post", "content=" + textarea.value + "&user=" + document.getElementById("user_name_form").value + "&room=" + document.getElementById("message_room").value);
        document.getElementById("chatbox").innerHTML += "<p>" + document.getElementById("user_name_form").value + ": " + textarea.value + "</p>";
        // console.log("a");
        textarea.value = "";
    }
}