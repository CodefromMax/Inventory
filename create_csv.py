import cgi
import mysql.connector
import csv
import time
import os
import cgitb

post = cgi.FieldStorage()
#print(post)
if os.path.exists(r'C:\website\Compliance\SwitchComplianceReport.csv'):
    os.remove(r'C:\website\Compliance\SwitchComplianceReport.csv')

interfaceIDs = map(int, post["IDs"].value.split(","))

#mysql database connection
host = "localhost";
username = "root";
password = "twnetwork";
dbname = "switch_compliance";

mydb = mysql.connector.connect(
  host=host,
  user=username,
  password=password,
  database=dbname
)

mycursor = mydb.cursor()

sql = "SELECT * FROM interfaces WHERE id = %s"

with open(r'C:\website\Compliance\SwitchComplianceReport.csv', 'w', newline='') as file:
    writer = csv.writer(file)
    writer.writerow(["Switch Name", "Interface Name", "Description", "VLAN", "Flag", "Status","IP", "MAC", "Model", "Version", "Date Last Accessed", "Location"])
    for id in interfaceIDs:
        mycursor.execute(sql, (id,))
        interface = mycursor.fetchone()
        mycursor.execute("SELECT * FROM switches WHERE switch_name = %s", (interface[1],))
        result = tuple(list(interface)[1:] + list(mycursor.fetchone())[1:])
