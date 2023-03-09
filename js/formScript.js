document.getElementById("form").addEventListener("submit", send);

function send(event) {
	event.preventDefault();

	const form = document.getElementById("form");
	const data = new FormData(form);
	fetch("php/sending_script.php", {
		body: data,
		method: "post",
	})
		.then((response) => response.text())
		.then((text) => {
			const output = document.getElementById("output");
			const note = document.createTextNode(text);
			output.appendChild(note);

			const sent = text.indexOf("błąd") < 0;

			if (sent) {
				output.classList.remove("output error");
				output.classList.add("output success");
			} else {
				output.classList.remove("output success");
				output.classList.add("output error");
			}
			output.style.display = "block";
		});
}
