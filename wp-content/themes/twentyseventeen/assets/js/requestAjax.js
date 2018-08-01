function processRequest(id) {
    var tableRow = document.getElementById(id).closest('tr'),
        tableData = tableRow.getElementsByTagName('td'),
        tdData = '',
        data = [],
        encodedData = '';

    data = getTdData(tableData);
    encodedData = encodeData(data);
    sendData(encodedData);
}

//get table data for each table row
function getTdData(td) {
    var title = '',
        location = '',
        url = '',
        event_date = '',
        eventData = [];

    //exclude the last column from the loop, as it's the button and it's not needed
    for (var i = 0; i < td.length-1; i++){
        //get event title
        if (td[i].classList.contains('e_title')) {
            title = td[i].innerHTML;
        }
        //get event location
        if (td[i].classList.contains('e_location')) {
            location = td[i].innerHTML;
        }
        //get event url
        if (td[i].classList.contains('e_url')) {
            url = td[i].getElementsByTagName('a')[0];
            
        }
        //get event event date
        if (td[i].classList.contains('e_date')) {
            event_date = td[i].innerHTML;
        }
        
        
    }
    eventData = {'title': title, 'location': location, 'url': url, 'date': event_date};
    
    return eventData;
}

function encodeData(eData) {
    var dataArray = [];
    
    for (var key in eData) {
        if (eData.hasOwnProperty(key)) {
            dataArray.push(key + '=' + encodeURIComponent(eData[key]));
        }
    }

    return dataArray.join('&');
}

//make ajax request to google calendar api
function sendData(data) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open('post', 'http://localhost/wordpress/googleCalendarController.php', true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.send(data);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState === 4) {
            if (xmlHttp.status === 200) {
                alert("Successfully added Event! You can review it on Google Calendar.");
            } else {
                alert("Error in adding event to Google Calendar, refer to Miro");
            }
        };
    };
}
