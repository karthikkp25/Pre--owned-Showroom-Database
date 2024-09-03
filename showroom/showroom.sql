-- Manager Table: Stores information about managers who oversee the vehicle inventory.
CREATE TABLE Manager (
    Manager_ID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(50) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Full_Name VARCHAR(100) NOT NULL,
    Phone_Number VARCHAR(20) NOT NULL
);

-- Vehicle Inventory Table: Contains details of all vehicles available in the inventory.
CREATE TABLE VehicleInventory (
    Vehicle_ID INT PRIMARY KEY AUTO_INCREMENT,
    Type ENUM('Car', 'Bike') NOT NULL,
    Model VARCHAR(100) NOT NULL,
    Brand VARCHAR(100) NOT NULL,
    Year INT NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Quantity INT NOT NULL,
    Manager_ID INT,
    FOREIGN KEY (Manager_ID) REFERENCES Manager(Manager_ID)
);

-- Customer Table: Stores information about customers who interact with the system.
CREATE TABLE Customer (
    Customer_ID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(50) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Full_Name VARCHAR(100) NOT NULL,
    Phone_Number VARCHAR(20) NOT NULL
);

-- Vehicle Booking Table: Records bookings made by customers for vehicles.
CREATE TABLE VehicleBooking (
    Booking_ID INT PRIMARY KEY AUTO_INCREMENT,
    Vehicle_ID INT,
    Customer_ID INT,
    Booking_Date DATE NOT NULL,
    FOREIGN KEY (Vehicle_ID) REFERENCES VehicleInventory(Vehicle_ID),
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);

-- Sales Table: Tracks sales made by managers.
CREATE TABLE Sales (
    Sale_ID INT PRIMARY KEY AUTO_INCREMENT,
    Vehicle_ID INT,
    Customer_ID INT,
    Sale_Date DATE NOT NULL,
    Sale_Price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (Vehicle_ID) REFERENCES VehicleInventory(Vehicle_ID),
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);
