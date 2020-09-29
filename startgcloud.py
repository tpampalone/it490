import os

if os.system("gcloud compute instances list"):
	True
else:
	os.system("gcloud sql connect myinstance --user=root")
	os.system("gcloud auth login")
	os.system("gcloud config set project augmented-tract-290623")
	os.system("gcloud config set compute/zone us-east4-c")
	os.system("gcloud compute instances start instance-1")

