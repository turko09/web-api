# Trip API

Trip API contains operations for allocating trips and updating trips' status.


## Getting a trip:

### ENDPOINT
`[website base address]/api/trip/get.php`

### REQUEST DETAILS

#### Request Method:
`GET`

#### Request Parameter:
|Name|Description|
|--|--|
|id|Id of the trip|

### RESPONSE DETAILS

#### Response Status Codes:
|Status|Description|
|--|--|
|200|Success|
|405|Method Not Allowed|

#### Response Body:
|Member|Data Type|Comment|
|--|--|--|
|id |numeric||
|vehicleId|numeric||
|passengerId|numeric||
|source|string||
|sourceLat|numeric||
|sourceLong|numeric||
|destination|string||
|destinationLat|numeric||
|destinationLong|numeric||
|stage|string||
|dateStart|datetime||
|dateEnd|datetime||
|datecreated|datetime||
|datemodified|datetime||

### SAMPLES

#### Sample Request:
~~~~
GET [website base address]/api/trip/get.php?id=100 HTTP/1.1 
~~~~

#### Sample Response:
~~~~
Access-Control-Allow-Methods: GET
Access-Control-Allow-Orgin: *
Connection: keep-alive
Content-Length: 439
Content-Type: application/json; charset=UTF-8
Date: Sat, 24 Mar 2018 11:53:33 GMT
Status: 200

{
    "id": 100,
    "vehicleId": 1,
    "passengerId": 1,
    "source": "Don Pablo Bldg, 114 Amorsolo Street, Legazpi Village, Makati, Kalakhang Maynila, Philippines",
    "sourceLat": 14.556764,
    "sourceLong": 121.014685,
    "destination": "San Agustin Church, General Luna St, Manila, Metro Manila, Philippines",
    "destinationLat": 14.58899,
    "destinationLong": 120.975238,
    "stage": "Requested",
    "dateStart": null,
    "dateEnd": null,
    "datecreated": "2018-03-24 11:47:49",
    "datemodified": null
}
~~~~


## Getting all trips:

### ENDPOINT
`[website base address]/api/trip/get.php`

### REQUEST DETAILS

#### Request Method:
`GET`

### RESPONSE DETAILS

#### Response Status Codes:
|Status|Description|
|--|--|
|200|Success|
|405|Method Not Allowed|

#### Response Body:
**Array of:**

|Member|Data Type|Comment|
|--|--|--|
|id |numeric||
|vehicleId|numeric||
|passengerId|numeric||
|source|string||
|sourceLat|numeric||
|sourceLong|numeric||
|destination|string||
|destinationLat|numeric||
|destinationLong|numeric||
|stage|string||
|dateStart|datetime||
|dateEnd|datetime||
|datecreated|datetime||
|datemodified|datetime||

### SAMPLES

#### Sample Request:
~~~~
GET [website base address]/api/trip/get.php HTTP/1.1 
~~~~

#### Sample Response:
~~~~
Access-Control-Allow-Methods: GET
Access-Control-Allow-Orgin: *
Connection: keep-alive
Content-Encoding: gzip
Content-Type: application/json; charset=UTF-8
Date: Sat, 24 Mar 2018 11:47:03 GMT
Status: 200

[
    {
        "id": 1,
        "vehicleId": 1,
        "passengerId": 1,
        "source": "Don Pablo Bldg, 114 Amorsolo Street, Legazpi Village, Makati, Kalakhang Maynila, Philippines",
        "sourceLat": 14.556764,
        "sourceLong": 121.014685,
        "destination": "San Agustin Church, General Luna St, Manila, Metro Manila, Philippines",
        "destinationLat": 14.58899,
        "destinationLong": 120.975238,
        "stage": "Requested",
        "dateStart": null,
        "dateEnd": null,
        "datecreated": "2018-03-24 11:40:03",
        "datemodified": "2018-03-24 11:40:03"
    },
    {
        "id": 2,
        "vehicleId": 2,
        "passengerId": 2,
        "source": "1883 Eusebio, Pasig, Metro Manila, Philippines",
        "sourceLat": 14.571438,
        "sourceLong": 121.097039,
        "destination": "252 Doña Soledad Ave, Parañaque, 1709 Metro Manila, Philippines",
        "destinationLat": 14.489057,
        "destinationLong": 121.020372,
        "stage": "Allocated",
        "dateStart": null,
        "dateEnd": null,
        "datecreated": "2018-03-24 11:43:03",
        "datemodified": "2018-03-24 11:45:03"
    },
    {
        "id": 3,
        "vehicleId": 3,
        "passengerId": 3,
        "source": "27 Pres M L Quezon, Taguig, 1637 Metro Manila, Philippines",
        "sourceLat": 14.517339,
        "sourceLong": 121.07315,
        "destination": "975 Mindanao Ave, Novaliches, Quezon City, Metro Manila, Philippines",
        "destinationLat": 14.72452,
        "destinationLong": 121.05588,
        "stage": "Ongoing",
        "dateStart": "2018-03-24 11:37:03",
        "dateEnd": null,
        "datecreated": "2018-03-24 11:32:03",
        "datemodified": "2018-03-24 11:45:03"
    },
    {
        "id": 4,
        "vehicleId": 4,
        "passengerId": 4,
        "source": "Tecno Hub, Commonwealth Ave, Diliman, Quezon City, Metro Manila, Philippines",
        "sourceLat": 14.657489,
        "sourceLong": 121.057913,
        "destination": "Festival Supermall, Alabang, Muntinlupa, 1781 Kalakhang Maynila, Philippines",
        "destinationLat": 14.416753,
        "destinationLong": 121.040746,
        "stage": "Completed",
        "dateStart": "2018-03-24 11:07:03",
        "dateEnd": "2018-03-24 11:47:03",
        "datecreated": "2018-03-24 11:02:03",
        "datemodified": "2018-03-24 11:47:03"
    },
    {
        "id": 5,
        "vehicleId": 5,
        "passengerId": 5,
        "source": "29-3 Colossians St, Marikina, 1800 Metro Manila, Philippines",
        "sourceLat": 14.645332,
        "sourceLong": 121.10848,
        "destination": "Tektite Tower East, Exchange Rd, San Antonio, Pasig, Metro Manila, Philippines",
        "destinationLat": 14.582573,
        "destinationLong": 121.062169,
        "stage": "Cancelled",
        "dateStart": null,
        "dateEnd": null,
        "datecreated": "2018-03-24 11:42:03",
        "datemodified": "2018-03-24 11:44:03"
    }
]
~~~~


## Getting all trips by stage:

### ENDPOINT
`[website base address]/api/trip/get.php`

### REQUEST DETAILS

#### Request Method:
`GET`

#### Request Parameter:
|Name|Description|Comment|
|--|--|--|
|stage|Stage of the trip|Could be **Requested**, **Allocated**, **Ongoing**, **Completed**, or **Cancelled**|

### RESPONSE DETAILS

#### Response Status Codes:
|Status|Description|
|--|--|
|200|Success|
|405|Method Not Allowed|

#### Response Body:
**Array of:**

|Member|Data Type|Comment|
|--|--|--|
|id |numeric||
|vehicleId|numeric||
|passengerId|numeric||
|source|string||
|sourceLat|numeric||
|sourceLong|numeric||
|destination|string||
|destinationLat|numeric||
|destinationLong|numeric||
|stage|string||
|dateStart|datetime||
|dateEnd|datetime||
|datecreated|datetime||
|datemodified|datetime||

### SAMPLES

#### Sample Request:
~~~~
GET [website base address]/api/trip/get.php?stage=Ongoing HTTP/1.1 
~~~~

#### Sample Response:
~~~~
Access-Control-Allow-Methods: GET
Access-Control-Allow-Orgin: *
Connection: keep-alive
Content-Length: 433
Content-Type: application/json; charset=UTF-8
Date: Sat, 24 Mar 2018 11:59:38 GMT
Status: 200

[
    {
        "id": 3,
        "vehicleId": 3,
        "passengerId": 3,
        "source": "27 Pres M L Quezon, Taguig, 1637 Metro Manila, Philippines",
        "sourceLat": 14.517339,
        "sourceLong": 121.07315,
        "destination": "975 Mindanao Ave, Novaliches, Quezon City, Metro Manila, Philippines",
        "destinationLat": 14.72452,
        "destinationLong": 121.05588,
        "stage": "Ongoing",
        "dateStart": "2018-03-24 11:48:54",
        "dateEnd": null,
        "datecreated": "2018-03-24 11:43:54",
        "datemodified": "2018-03-24 11:56:54"
    }
]
~~~~


## Allocating a trip:

### ENDOINT
`[website base address]/api/trip/allocate.php`

### REQUEST DETAILS

#### Request Method:
`POST`

#### Request Body:
|Member|Data Type|Comment|
|----|--|--|
|tripId|numeric||
|vehicleId|numeric||
|passengerId|numeric||

### RESPONSE DETAILS

#### Response Status Codes:
|Status|Description|
|--|--|
|200|Success|
|400|Bad Request|
|404|Not Found|
|405|Method Not Allowed|

#### Response Body:
|Member|Data Type|Comment|
|--|--|--|
|message|string||
|tripId|numeric|Present only if operation is successful|
|vehicleId|numeric|Present only if operation is successful|
|passengerId|numeric|Present only if operation is successful|

### SAMPLES

#### Sample Request:
~~~~
POST [website base address]/api/trip/allocate.php HTTP/1.1
Content-Type: application/json

{
    "tripId": 100,
    "vehicleId": 1,
    "passengerId": 1
}
~~~~

#### Sample Response:
~~~~
Access-Control-Allow-Methods: POST
Access-Control-Allow-Orgin: *
Connection: keep-alive
Content-Length: 72
Content-Type: application/json; charset=UTF-8
Date: Sat, 24 Mar 2018 12:08:34 GMT
Status: 200

{
    "message": "Trip allocated.",
    "tripId": 100,
    "vehicleId": 1,
    "passengerId": 1
}
~~~~


## Starting a trip:

### ENDOINT
`[website base address]/api/trip/start.php`

### REQUEST DETAILS

#### Request Method:
`POST`

#### Request Body:
|Member|Data Type|Comment|
|--|--|--|
|tripId|numeric||

### RESPONSE DETAILS

#### Response Status Codes:
|Status|Description|
|--|--|
|200|Success|
|400|Bad Request|
|404|Not Found|
|405|Method Not Allowed|

#### Response Body:
|Member|Data Type|Comment|
|--|--|--|
|message|string||
|tripId|numeric|Present only if operation is successful|

### SAMPLES

#### Sample Request:
~~~~
POST [website base address]/api/trip/start.php HTTP/1.1
Content-Type: application/json

{
    "tripId": 100
}
~~~~

#### Sample Response:
~~~~
Access-Control-Allow-Methods: POST
Access-Control-Allow-Orgin: *
Connection: keep-alive
Content-Length: 40
Content-Type: application/json; charset=UTF-8
Date: Sat, 24 Mar 2018 12:12:43 GMT
Status: 200

{
    "message": "Trip started.",
    "tripId": 100
}
~~~~


## Ending a trip:

### ENDOINT
`[website base address]/api/trip/end.php`

### REQUEST DETAILS

#### Request Method:
`POST`

#### Request Body:
|Member|Data Type|Comment|
|--|--|--|
|tripId|numeric||

### RESPONSE DETAILS

#### Response Status Codes:
|Status|Description|
|--|--|
|200|Success|
|400|Bad Request|
|404|Not Found|
|405|Method Not Allowed|

#### Response Body:
|Member|Data Type|Comment|
|--|--|--|
|message|string||
|tripId|numeric|Present only if operation is successful|

### SAMPLES

#### Sample Request:
~~~~
POST [website base address]/api/trip/end.php HTTP/1.1
Content-Type: application/json

{
    "tripId": 100
}
~~~~

#### Sample Response:
~~~~
Access-Control-Allow-Methods: POST
Access-Control-Allow-Orgin: *
Connection: keep-alive
Content-Length: 38
Content-Type: application/json; charset=UTF-8
Date: Sat, 24 Mar 2018 12:15:56 GMT
Status: 200

{
    "message": "Trip ended.",
    "tripId": 100
}
~~~~


## Canceling a trip:

### ENDOINT
`[website base address]/api/trip/cancel.php`

### REQUEST DETAILS

#### Request Method:
`POST`

#### Request Body:
|Member|Data Type|Comment|
|--|--|--|
|tripId|numeric||

### RESPONSE DETAILS

#### Response Status Codes:
|Status|Description|
|--|--|
|200|Success|
|400|Bad Request|
|404|Not Found|
|405|Method Not Allowed|

#### Response Body:
|Member|Data Type|Comment|
|--|--|--|
|message|string||
|tripId|numeric|Present only if operation is successful|

### SAMPLES

#### Sample Request:
~~~~
POST [website base address]/api/trip/cancel.php HTTP/1.1
Content-Type: application/json

{
    "tripId": 100
}
~~~~

#### Sample Response:
~~~~
Access-Control-Allow-Methods: POST
Access-Control-Allow-Orgin: *
Connection: keep-alive
Content-Length: 42
Content-Type: application/json; charset=UTF-8
Status: 200

{
    "message": "Trip cencelled.",
    "tripId": 100
}
~~~~