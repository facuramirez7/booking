import time
import datetime
import threading
import mysql.connector
from mysql.connector import Error

sede = 1
sede = str(sede)
def sendMeli(itera,hora,cupo):
#comprueba el sistema y luego el pais
    today = datetime.date.today () #Obtener la fecha de hoy
    itera += 1
    tomorrow = today + datetime.timedelta(days=i)
    tomorrow = str(tomorrow)
    print('DIA '+ tomorrow)
    while hora < 20:
        hora_str = str(hora)
        hora_f = hora+1
        hora_str_f = str(hora_f)
        if hora < 10 and hora_f < 10:
            sql = "INSERT INTO bookings (start_time, finish_time,cupo,sede) VALUES ('" + tomorrow + " 0" + hora_str + ":00:00', '"+ tomorrow + " 0" + hora_str_f + ":00:00',"+ cupo + ","+ sede +");"
        elif hora_f == 10:
            sql = "INSERT INTO bookings (start_time, finish_time,cupo,sede) VALUES ('" + tomorrow + " 0" + hora_str + ":00:00', '"+ tomorrow + " " + hora_str_f + ":00:00',"+ cupo + ","+ sede +");"
        else:
            sql = "INSERT INTO bookings (start_time, finish_time,cupo,sede) VALUES ('" + tomorrow + " " + hora_str + ":00:00', '"+ tomorrow + " " + hora_str_f + ":00:00',"+ cupo + ","+ sede +");"
        print(sql)
        print("_____________________________________")
        hora = hora + 1
        createcursor = connection.cursor()
        createcursor.execute(sql)
        connection.commit()
                
                 

#conexion a la bd
try:
    connection = mysql.connector.connect(user = 'root', 
                                        password = '', 
                                        host = 'localhost', 
                                        database = 'appointment', 
                                        port = '3306')
    #si la conexion es correcta:
    if connection.is_connected():
        print('Connection is OK.')
        cursor = connection.cursor()
        #query
        threads = list()
        for i in range(10):  
            #print(i)
            hora = 7
            itera = 0
            cupo = 20
            cupo = str(cupo)         
            t = threading.Thread(target=sendMeli,args=(itera,hora,cupo,)) 
            threads.append(t)
            time.sleep(0.3)
            t.start()
            #print(t)
               
#si no se puede conectar a la db           
except Error as ex:
        print('Connection error.',ex)




