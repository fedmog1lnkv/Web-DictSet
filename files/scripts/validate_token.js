function validate_token() {
    let statusCodeServer;
    if (localStorage.getItem('token_dictset')) {
        var token_dictset = localStorage.getItem('token_dictset');

        console.log(`https://localhost:7078/api/ValidateToken/token/${token_dictset}`);

        fetch(`https://localhost:7078/api/ValidateToken/token/${token_dictset}`)
            .then(response => {
                statusCode = response.status;
                return response.text();
            })
            .then(data => {
                console.log(`Status Code: ${statusCode}`);
                statusCodeServer = statusCode;
            })
            .catch(error => console.error(error));

    } else {
        window.location.href = 'login.html';
    }
    if (statusCodeServer == 401) {
        localStorage.removeItem("token_dictset");
        window.location.href = 'login.html';
    }
}