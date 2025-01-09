# Urban Complaints Management System

A web-based system designed for managing urban complaints. This project utilizes **Symfony**, **API Platform** for backend services, and **React.js** for frontend interfaces. The system allows users to submit, track, and manage complaints related to urban services, ensuring that city-related issues are efficiently addressed.

## Features

- **Complaint Submission**: Allow users to submit complaints related to urban services such as waste management, road issues, etc.
- **Complaint Tracking**: Users can track the status of their submitted complaints.
  
## Technologies

- **Backend**: Symfony, API Platform
- **Frontend**: React.js
- **Database**: MySQL 

## Functionalities

### API Endpoints

- **Complaint Management**: APIs for creating, viewing, updating, and deleting complaints.
- **Complaint Status Updates**: Ability for administrators to update the status of complaints.

### Frontend

- **React-based UI**: A user-friendly interface for submitting and managing complaints.
- **Responsive Design**: Works on both desktop and mobile devices.

## Installation

### Prerequisites

- **Node.js** (version 14 or higher)
- **PHP** (version 7.4 or higher)
- **Composer** (PHP dependency manager)
- **MySQL Database** (or any other relational database of your choice)
- **npm** (Node Package Manager)

### Backend Setup (Symfony + API Platform)


     ```bash
     # Clone the repository
     git clone https://github.com/achrafalfitouri/FixMyStreet-BackEnd.git
     cd FixMyStreet-BackEnd

     # Install project dependencies
     composer install

     # Create the database
     php bin/console doctrine:database:create

     # Run database migrations to set up the schema
     php bin/console doctrine:migrations:migrate

     # Start the Symfony development server
     symfony server:start
### For Frontend Setup visit the following url : 
https://github.com/achrafalfitouri/FixMyStreet-FrontEnd

