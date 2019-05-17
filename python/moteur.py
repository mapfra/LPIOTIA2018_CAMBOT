# import des librairies
import time
import RPi.GPIO as GPIO
import paho.mqtt.client as mqtt

#définition des broches du GPIO 
ENA=12
IN1=38
IN2=40
IN3=35
IN4=37
ENB=11

def init():
	#initialisation du GPIO
    GPIO.setmode(GPIO.BOARD)
    GPIO.setwarnings(false)
	# broches GPIO en mode sortie
    GPIO.setup(ENA, GPIO.OUT)
    GPIO.setup(IN1, GPIO.OUT)
    GPIO.setup(IN2, GPIO.OUT)
    GPIO.setup(IN3, GPIO.OUT)
    GPIO.setup(IN4, GPIO.OUT)
    GPIO.setup(ENB, GPIO.OUT)

def on_connect(client, userdata, flags, rc): # fonction executée lors de la connexion au serveur MQTT
    print("Connected with result code "+str(rc))
    # souscription au topic "cambot"
	client.subscribe("cambot")


def on_message(client, userdata, msg): # Fonction executée lorsqu'un message est reçu sur le topic souscrit
    print(str(msg.payload))
    if msg.payload == "avancer": # condition si le message reçu est = à "avancer", le robot se déplace vers l'avant
        init()
        avancer()
        stopper()
    elif msg.payload == "reculer": # condition si le message reçu est = à "reculer", le robot se déplace vers l'arrière
        init()
        reculer()
        stopper()
    elif msg.payload == "reculer": # condition si le message reçu est = à "gauche", le robot tourne vers la gauche
        init()
        gauche()
        stopper()
    elif msg.payload == "reculer": # condition si le message reçu est = à "droite", le robot tourne vers la droite
        init()
        droite()
        stopper()

def avancer(): # déplace le robot vers l'avant
    GPIO.output(IN1, GPIO.HIGH)
    GPIO.output(IN2, GPIO.LOW)
    GPIO.output(IN3, GPIO.HIGH)
    GPIO.output(IN4, GPIO.LOW)
    p=GPIO.PWM(ENA, 2)
    p.start(50)
    print ("avance vers l'avant")

    time.sleep(5)


def reculer(): # déplace le robot vers l'arrière
    GPIO.output(IN1, GPIO.LOW)
    GPIO.output(IN2, GPIO.HIGH)
    GPIO.output(IN3, GPIO.LOW)
    GPIO.output(IN4, GPIO.HIGH)
    p=GPIO.PWM(ENA, 2)
    p.start(50)
    print ("recule")

    time.sleep(5)

def gauche(): # rotation du robot vers la gauche
    GPIO.output(IN1, GPIO.LOW)
    GPIO.output(IN2, GPIO.HIGH)
    GPIO.output(IN3, GPIO.LOW)
    GPIO.output(IN4, GPIO.HIGH)
    p=GPIO.PWM(ENA, 2)
    p.start(50)
    print ("gauche")
	
    time.sleep(5)

def droite(): # rotation du robot vers la droite
    GPIO.output(IN1, GPIO.LOW)
    GPIO.output(IN2, GPIO.HIGH)
    GPIO.output(IN3, GPIO.LOW)
    GPIO.output(IN4, GPIO.HIGH)
    p=GPIO.PWM(ENA, 2)
    p.start(50)
    print ("droite")

    time.sleep(5)


def stopper(): # stoppe les moteurs 
    GPIO.output(IN1, GPIO.LOW) # mise
    GPIO.output(IN2, GPIO.LOW)
    GPIO.output(IN1, GPIO.LOW)
    GPIO.output(IN2, GPIO.LOW)

    print ("stoppee")
    GPIO.cleanup()

client = mqtt.Client() # création de l'objet client a partir de la classe MQTT
client.on_connect = on_connect # définition de la fonction lors de la connexion au serveur MQTT
client.on_message = on_message # définition de la fonction lorsq'un message est reçu sur le topic souscrit

client.connect("localhost", 1883, 60) # connexion au serveur MQTT

client.loop_forever() # boucle qui s'execute tant que le script python est en cours 
