CREATE DATABASE patientinformation;

CREATE TABLE patientinformation.Insurance(
    InsuranceCode BIGINT NOT NULL,
    InsuranceName varchar(255),
    PRIMARY KEY (InsuranceCode)
);
CREATE TABLE patientinformation.Address(
    AddressId int NOT NULL AUTO_INCREMENT,
    ZIPCode int,
    Street varchar(255),
    County varchar(255),
    City varchar(255),
    State varchar(255),
    PRIMARY KEY (AddressId)
);
CREATE TABLE patientinformation.Patient(
    PatientSsn BIGINT NOT NULL,
    Sex varchar(255) NOT NULL,
    Name varchar(255) NOT NULL,
    DOB BIGINT,
    PhoneNumber BIGINT,
    InsuranceCode BIGINT NOT NULL,
    AddressId int,
    PRIMARY KEY (PatientSsn),
    FOREIGN KEY (InsuranceCode) REFERENCES Insurance(InsuranceCode),
    FOREIGN KEY (AddressId) REFERENCES Address(AddressId)
);
CREATE TABLE patientinformation.MedicalHistory(
    ICD int NOT NULL,
    CPT int NOT NULL,
    Date int,
    PRIMARY KEY (ICD)
);
CREATE TABLE patientinformation.MedicalHistoryOfPatient(
    ICD int NOT NULL,
    PatientSsn BIGINT NOT NULL,
    PRIMARY KEY (ICD, PatientSsn),
    FOREIGN KEY (ICD) REFERENCES MedicalHistory(ICD),
    FOREIGN KEY (PatientSsn) REFERENCES Patient(PatientSsn)
);
CREATE TABLE patientinformation.Doctor(
	EmployeeId int NOT NULL AUTO_INCREMENT,
	SpecialtyDepartment varchar(255),
	Name varchar(255) NOT NULL,  
	AddressId int,
	PhoneNumber BIGINT,
	PRIMARY KEY (EmployeeId),
	FOREIGN KEY (AddressId) REFERENCES Address(AddressId)
);
CREATE TABLE patientinformation.Treatment(
    PatientSsn BIGINT NOT NULL,
    EmployeeId int NOT NULL,
    PRIMARY KEY (PatientSsn, EmployeeId),
    FOREIGN KEY (PatientSsn) REFERENCES Patient(PatientSsn),
    FOREIGN KEY (EmployeeId) REFERENCES Doctor(EmployeeId)
);
CREATE TABLE patientinformation.Appointment(
	AppointmentId int NOT NULL AUTO_INCREMENT,
	Date BIGINT NOT NULL,
	Time int NOT NULL,
	EmployeeID int NOT NULL,
	PRIMARY KEY	(AppointmentId),
	FOREIGN KEY (EmployeeID) REFERENCES Doctor(EmployeeID)
);
