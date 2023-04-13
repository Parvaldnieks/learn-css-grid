function search(event) {
    event.preventDefault();
    const form = event.target
    console.log('Form action: ' + form.action);
    console.log('Form method: ' + form.method);
    const formData = new formData(form);
    console.log('Form data: ', formData);

    const response = await response.json();
    console.log(json);
    const resultDiv = document.getElementById('ul');
    resultDiv.innerHTML = json;
    json.forEach(text => {
        const row = document.createElement("li");

        Object.keys(text).forEach(val => {
            const p = document.createElement("p");
            p.innerHTML = val +"-"+ text[val];
            row.append(p);
        });
        resultDiv.append(row);
    });
}