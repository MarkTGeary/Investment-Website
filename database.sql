-- Create the database
CREATE DATABASE business_information;

-- Use the created database
USE business_information;

-- Create table for contact information
CREATE TABLE company_contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contact_name VARCHAR(255),
    email VARCHAR(255),
    phone_number VARCHAR(255)
);

-- Create table for business details
CREATE TABLE business_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    details TEXT
);

-- Create table for financial data
CREATE TABLE financial_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    financial_type VARCHAR(255),
    financial_value VARCHAR(255)
);

-- Create table for additional information
CREATE TABLE additional_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    topic VARCHAR(255),
    information TEXT
);

-- Create table for investor data
CREATE TABLE investor_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    person VARCHAR(255),
    amount VARCHAR(255)
);
