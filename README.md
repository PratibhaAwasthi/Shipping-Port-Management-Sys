# Shipping Port Management System

## Overview:

The Shipping Port Management System is a web application designed to manage the operations of a standard hub with ten ports for shipping consignments. The application provides a platform for countries to use these ports for their trade operations by allowing managers to browse available ports and book them for their route. The purpose of this application is to provide a more manageable and more efficient common trading platform for countries who are the intended users.

## Motivation:

The Shipping Port Management System was designed to address the challenges of managing a standard hub with ten ports for shipping consignments. The traditional approach to port management is manual and paper-based, which is prone to errors and delays. This application provides a more efficient and automated system that can handle a large volume of requests and transactions in real-time.

## Timeline:

The project timeline is estimated to be 1.5 months, divided into the following phases:

* Phase 1: Requirements Gathering and Planning (1 week)
* Phase 2: Database Design and Implementation (2 weeks)
* Phase 3: Front-end Development (2 weeks)
* Phase 4: Back-end Development (2 weeks)
* Phase 5: Testing and Deployment (1 week)

## Objects:

1. Ports: Each port is owned by a country, has some ships docked in it, has a storage facility for a type of container, is managed by employees, and is associated with some attributes.
2. Ships: Ships are owned by a country, docked in some ports, can carry specific containers, will have an operating sequence (arrived loaded-present loaded-present unloaded-departure unloaded, etc.), and have some other attributes.
3. Container: There are different container types, having transit code, stored at one particular port, and are meant to be imported or exported.

## Actors:

1. Country: The country manager is responsible for managing its trades with different countries.
     * Importer: Countries import goods from other countries.
     * Exporter: Countries export goods to other countries.
     * Owner: Few countries own ports.
2. Employee: Employees work at a standard port hub. 
     * Port Manager: Accountable for managing the operations on their port terminal.
     * Central Manager: Head of all the port managers.
     * Security: Inspect, patrol premises, and verify transit codes. 
     * Docker: Loading and unloading the containers.

## Planned Functionality and Operations:

1. Import/Export functionality:
      
* Country:  The manager of the particular country raises a request for a port and would also be able to generate weekly/fortnightly/monthly reports based   on the number of ships, number of containers and tariff, for their own country. 
The country sends/receives containers through ships.

* Employee: The Central Manager of the port hub will be responsible for taking requests from the countries and providing a status(a request is accepted, rejected, withdrawn, or pending) for export or import. A request is :

    * Accepted - Port is available, and maximum container capacity has not been reached.
    * Rejected - No trade agreement with the country for which the request is raised.
    * Pending - Port not available, and next available date will be provided.
    * Withdrawn - Country has withdrawn its request.
   
    The Port Manager will supervise the operations of the port.
    The docker will load/unload the containers to/from the ship.
    Security will take care of transit code verification (if required).

2. Port Management functionality: A central Manager of the port hub will be responsible for keeping a central database of all information like the number of ships at the port, employees working at the port, operating sequence for a ship, etc., and can generate reports based on the information.
For example, a ship is supposed to arrive with a container, unload it at the port, and depart. The operating sequence will be AL-PL-PU-DU-Done (AL= Arrive loaded, PL= Present loaded, PU = Present unloaded, DU = Depart unloaded ). The operating sequence will be different in other situations.
     
    Every port will have a port manager who will update the port’s and ship’s current status, the number of employees, etc. The port's status (availability) will depend on its maximum ship capacity and number of ship’s present. The ships will have information about their arrival date, expected departure date, their operating sequence, and the container type they are carrying. 

## Entity-Relationship Diagram 

![ERD](https://user-images.githubusercontent.com/82785478/226239106-2a3f4fb8-2c09-4ba1-a155-ac59ea9a6894.png)

## Conclusion:

The Shipping Port Management System is a comprehensive solution to the challenges of managing a standard hub with ten ports for shipping consignments. It offers a user-friendly interface for managing the operations of the port and provides a more efficient and automated system that can handle a large volume of requests and transactions in real-time. The system is estimated to take 1.5 months to complete, and the project timeline is divided into five phases to ensure its smooth implementation.

## Demo

### Login page

<img width="1274" alt="1_Login_page" src="https://user-images.githubusercontent.com/82785478/226486381-d05a71e3-3922-4de3-a816-9c051bff2731.png">

### Admin login page

<img width="1268" alt="2_admin_login_page" src="https://user-images.githubusercontent.com/82785478/226486415-f04f4a92-9c05-414e-8ac9-f2a27faaa494.png">

### Admin Home page

<img width="1275" alt="3_Admin_home_page" src="https://user-images.githubusercontent.com/82785478/226486440-ecae2ba3-906f-43b3-88b6-0d8366e489ea.png">

### Admin report request page

<img width="1269" alt="4_Admin_report_request_page" src="https://user-images.githubusercontent.com/82785478/226486501-f70744a5-223b-4a42-9c4c-776831b59d26.png">

### Report 

<img width="1280" alt="5_Report Retrieved_page" src="https://user-images.githubusercontent.com/82785478/226486536-8b7811f5-6d07-401b-8d70-3c5a2d947173.png">

### Admin ship update status

<img width="1280" alt="6_Admin_ship_status_update_page" src="https://user-images.githubusercontent.com/82785478/226486595-79010418-f58d-47e2-8b78-e65c399899f5.png">

<img width="1280" alt="7_Status_updated" src="https://user-images.githubusercontent.com/82785478/226486616-98b42ac1-dfad-4dbd-be35-bb3e4ba1ff63.png">

### User login page

<img width="1280" alt="8_User_login_page" src="https://user-images.githubusercontent.com/82785478/226486643-f4a3b23b-2be3-484f-8e3b-8266ae57a44c.png">

### User home page

<img width="1280" alt="9_user_home_page" src="https://user-images.githubusercontent.com/82785478/226486663-e435aa0f-4ded-4117-9df1-9a2abb890889.png">

### Port requesting

<img width="1276" alt="10_raising_port_request_page" src="https://user-images.githubusercontent.com/82785478/226486700-c4fc2ff2-f91c-4524-bec9-62bdc1466a44.png">

### Report requesting & types

<img width="1280" alt="11_report" src="https://user-images.githubusercontent.com/82785478/226486748-1e461011-7896-4823-813a-704be94c6671.png">

### Export-Import report & its history

<img width="1280" alt="12_report" src="https://user-images.githubusercontent.com/82785478/226486800-239a076c-49c2-4488-8fb9-b7afb6aa00b4.png">

<img width="1275" alt="13_history" src="https://user-images.githubusercontent.com/82785478/226486825-35af11e1-3c93-4edd-afdd-309c8cb3f927.png">

### Tariff report & its history

<img width="1280" alt="14_tariff_report_form" src="https://user-images.githubusercontent.com/82785478/226486881-5e53bd14-95cc-45be-8d6d-5d2f16c617df.png">

<img width="1280" alt="15_tariff_history" src="https://user-images.githubusercontent.com/82785478/226486893-3b09e0ba-6860-4aed-89d0-fd761dc2afba.png">

### Checking Ship status 

<img width="1280" alt="16_ship_status" src="https://user-images.githubusercontent.com/82785478/226486933-202c4c30-0a34-40d5-833d-93ce604bf73e.png">

<img width="1280" alt="17_Ship_status" src="https://user-images.githubusercontent.com/82785478/226486952-b7d4c324-57d9-49e7-afe6-b5c0ea1a7b45.png">

<img width="1275" alt="18_status_Result" src="https://user-images.githubusercontent.com/82785478/226486964-eab41eef-85df-41fa-ae24-40016512b258.png">


## Requirements

You need the following application installed on your system to run this project:

* XAMPP ~  7.3.30
* Any IDE
* Any WebBrowser

## Getting Started

* Clone this repo locally into the location of your choice.
* Move and merge the content of the frontEnd folder and backEnd folder at one single repository. Note, the calling of certain files have been done in a way that  requires them to be merged. 
* Open XAMPP, enabling necessary tabs.
*  Clone the repo at "ht docs" folder.
*   Use your browser to host the website locally.

## Tool and Technologies Used:
* Front End: JavaScript, HTML5
* Back  End: PHP, MySQL database
