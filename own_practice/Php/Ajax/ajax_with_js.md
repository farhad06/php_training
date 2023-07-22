######################################## Creating the HTML ######################################

```
<!DOCTYPE html>
<html>
<head>
    <title>AJAX Example</title>
</head>
<body>
    <button onclick="fetchData()">Fetch Data</button>
    <div id="data-container">
        <!-- Data fetched using AJAX will be displayed here -->
    </div>

    <script src="path/to/your/javascript.js"></script>
</body>
</html>
```

###################################### Writing JavaScript Code ###################################

```
function fetchData() {
    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure the request
    xhr.open('GET', 'path/to/your/server/endpoint', true);

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Response received successfully
            var responseData = xhr.responseText;
            displayData(responseData);
        }
    };

    // Send the request
    xhr.send();
}
```

```
function displayData(data) {
    // Update the data-container with the fetched data
    var dataContainer = document.getElementById('data-container');
    dataContainer.innerHTML = data;
}
```

###################################### Server-Side Implementation ###################################

```
<?php
// server.php

$data = "Data fetched using AJAX!";
echo $data;

?>
```

#################################### All Functions Used in Ajax with Javascript #############################################


1. **XMLHttpRequest Object**:
   The `XMLHttpRequest` (XHR) object is the core of AJAX and allows you to send and receive HTTP requests. It provides methods and properties for handling asynchronous requests.

2. **xhr.open(method, url, async)**:
   This method configures the request before sending it. It specifies the HTTP method (e.g., GET, POST, etc.), the URL of the server endpoint, and whether the request should be asynchronous (true) or synchronous (false).

3. **xhr.send(data)**:
   This method sends the HTTP request to the server. You can optionally pass data to be sent as part of the request body (for POST requests).

4. **xhr.onreadystatechange**:
   This property holds the callback function that will be executed whenever the `readyState` property of the `XMLHttpRequest` object changes. It is used to handle the server's response.

5. **xhr.readyState**:
   This property represents the state of the request. It can have different values:
   - `0`: UNSENT - The `XMLHttpRequest` object has been created, but the `open()` method has not been called yet.
   - `1`: OPENED - The `open()` method has been called, and the request has been initialized.
   - `2`: HEADERS_RECEIVED - The `send()` method has been called, and the server has sent the response headers.
   - `3`: LOADING - The response is being received; partial data is available.
   - `4`: DONE - The operation is complete, and the response is fully received.

6. **xhr.status**:
   This property holds the HTTP status code returned by the server (e.g., 200 for success, 404 for not found, etc.).

7. **xhr.responseText**:
   This property contains the response text received from the server. It is commonly used to retrieve the data sent by the server.

8. **xhr.responseXML**:
   This property holds the response data as an XML document if the server response is in XML format.

9. **xhr.setRequestHeader(header, value)**:
   This method sets a request header to be included in the HTTP request. It is useful for specifying additional information, such as the content type or authorization headers.

10. **xhr.abort()**:
    This method aborts the current HTTP request if it is in progress.


## Below is an example of using AJAX with JavaScript:

```javascript
function fetchData() {
    var xhr = new XMLHttpRequest();

    // Configure the request
    xhr.open('GET', 'path/to/server/endpoint', true);

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Request successful, handle the response data
                var responseData = xhr.responseText;
                console.log(responseData);
            } else {
                // Request failed, handle error
                console.error('Request failed with status:', xhr.status);
            }
        }
    };

    // Send the request
    xhr.send();
}
```

