import os
import pika


connection = pika.BlockingConnection(pika.ConnectionParameters('localhost'))
if connection.is_open:
	print('OK')
	connection.close()
else:
	os.system("rabbitmqctl start_app")
