# Shipping Port Management System

## Overview:

The Shipping Port Management System is a web application designed to manage the operations of a standard hub with ten ports for shipping consignments. The application provides a platform for countries to use these ports for their trade operations by allowing managers to browse available ports and book them for their route. The purpose of this application is to provide a more manageable and more efficient common trading platform for countries who are the intended users.

## Motivation:

The Shipping Port Management System was designed to address the challenges of managing a standard hub with ten ports for shipping consignments. The traditional approach to port management is manual and paper-based, which is prone to errors and delays. This application provides a more efficient and automated system that can handle a large volume of requests and transactions in real-time.

## Timeline:

The project timeline is estimated to be 1.5 months, divided into the following phases:

Phase 1: Requirements Gathering and Planning (1 week)
Phase 2: Database Design and Implementation (2 weeks)
Phase 3: Front-end Development (2 weeks)
Phase 4: Back-end Development (2 weeks)
Phase 5: Testing and Deployment (1 week)

## Objects:

1 Ports: Each port is owned by a country, has some ships docked in it, has a storage facility for a type of container, is managed by employees, and is associated with some attributes.
2 Ships: Ships are owned by a country, docked in some ports, can carry specific containers, will have an operating sequence (arrived loaded-present loaded-present unloaded-departure unloaded, etc.), and have some other attributes.
3 Container: There are different container types, having transit code, stored at one particular port, and are meant to be imported or exported.
Actors:

Country: The country manager is responsible for managing its trades with different countries.
Importer: Countries import goods from other countries.
Exporter: Countries export goods to other countries.
Owner: Few countries own ports.
Employee: Employees work at a standard port hub.
Port Manager: Accountable for managing the operations on their port terminal.
Central Manager: Head of all the port managers.
Security: Inspect, patrol premises, and verify transit codes.
Docker: Loading and unloading the containers.
Planned Functionality and Operations:

Import/Export functionality - The country manager raises a request for a port, and the central manager of the port hub will provide a status for export or import. The port manager will supervise the operations of the port, and the docker will load/unload the containers to/from the ship. Security will take care of transit code verification (if required).
Port Management functionality - The central manager of the port hub will keep a central database of all information, and every port will have a port manager who will update the port’s and ship’s current status. The ships will have information about their arrival date, expected departure date, their operating sequence, and the container type they are carrying.

Conclusion:

The Shipping Port Management System is a comprehensive solution to the challenges of managing a standard hub with ten ports for shipping consignments. It offers a user-friendly interface for managing the operations of the port and provides a more efficient and automated system that can handle a large volume of requests and transactions in real-time. The system is estimated to take 1.5 months to complete, and the project timeline is divided into five phases to ensure its smooth implementation.
### Requirements

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
