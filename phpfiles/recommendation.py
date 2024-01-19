import pandas as pd
import mysql.connector as sqltor
mycon= sqltor.connect(host="localhost", user="root", password="", database="resource")
if mycon.is_connected():
    # Read frontend.csv into a DataFrame
    df = pd.read_csv('C:/xampp/htdocs/major_project/phpfiles/frontend.csv')
    # Display the first few rows of the DataFrame
    pd.set_option('display.max_rows', None)  # This ensures all rows are displayed
    print(df)