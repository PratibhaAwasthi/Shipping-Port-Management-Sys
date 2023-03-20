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

<img width="1274" alt="Login_page" src="https://user-images.githubusercontent.com/82785478/226483271-a94c6c7a-bb7b-4d17-8a5f-1cce893ab153.png">

### Admin login page

<img width="1268" alt="admin_login_page" src="https://user-images.githubusercontent.com/82785478/226483323-18325d55-706c-4129-beb5-93cb162e7757.png">


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
