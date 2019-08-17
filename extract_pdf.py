# Import libraries 
from PIL import Image
import pytesseract
import sys
from pdf2image import convert_from_path
import os
import datetime
import sys
import boto3
import json
  
# Path of the pdf 
file_path = "pdf/"
#PDF_file = "HCL_ID_Card"
#PDF_file = "Data_Science_with_python"
#PDF_file = "BV_ID_Card"
#PDF_file = "BGV"
#PDF_file = "infotachus"
#PDF_file = "Clinical_Trials3"
#PDF_file = "DB_ID_Card"

PDF_file = sys.argv[1]




  
''' 
Part #1 : Converting PDF to images 
'''
  
# Store all the pages of the PDF in a variable 
pages = convert_from_path(file_path+PDF_file+'.pdf', 500) 
  
# Counter to store images of each page of PDF to image 
image_counter = 1

# Iterate through all the pages stored above 
for page in pages: 
  
    # Declaring filename for each page of PDF as JPG 
    # For each page, filename will be: 
    # PDF page 1 -> page_1.jpg 
    # PDF page 2 -> page_2.jpg 
    # PDF page 3 -> page_3.jpg 
    # .... 
    # PDF page n -> page_n.jpg 
    filename = "page_"+str(image_counter)+".jpg"
      
    # Save the image of the page in system 
    page.save(filename, 'JPEG') 
  
    # Increment the counter to update filename 
    image_counter = image_counter + 1
  
''' 
Part #2 - Recognizing text from the images using OCR 
'''

# Variable to get count of total number of pages 
filelimit = image_counter-1

# Creating a text file to write the output 
#'_'+datetime.datetime.now().strftime('%Y_%M_%d_%H_%M')+
outfile = 'extracted_text_files/'+PDF_file+'.txt'

# Open the file in append mode so that  
# All contents of all images are added to the same file 
f = open(outfile, "w")
  
# Iterate from 1 to total number of pages 
for i in range(1, filelimit + 1): 
  
    # Set filename to recognize text from 
    # Again, these files will be: 
    # page_1.jpg 
    # page_2.jpg 
    # .... 
    # page_n.jpg 
    filename = "page_"+str(i)+".jpg"
          
    # Recognize the text as string in image using pytesserct 
    text = str(((pytesseract.image_to_string(Image.open(filename))))) 
  
    # The recognized text is stored in variable text 
    # Any string processing may be applied on text 
    # Here, basic formatting has been done: 
    # In many PDFs, at line ending, if a word can't 
    # be written fully, a 'hyphen' is added. 
    # The rest of the word is written in the next line 
    # Eg: This is a sample text this word here GeeksF- 
    # orGeeks is half on first line, remaining on next. 
    # To remove this, we replace every '-\n' to ''. 
    text = text.replace('-\n', '')     
    print(text)
    # Finally, write the processed text to the file. 
    f.write(text) 
  
# Close the file after writing all the text.
f.close()


############
#creating Json file for fetching keywords

#reading text file
text_file = 'extracted_text_files/'+PDF_file+'.txt'
with open(text_file, 'r') as content_file:
    text_data = content_file.read()

#using AWS to get keyword of context
client = boto3.client(service_name='comprehendmedical', region_name='us-east-1')
result = client.detect_entities(Text= text_data)

#setting json file directory and name
json_file = 'extracted_json_files/'+PDF_file+'.json'
#data=  json.dumps(result['Entities'], indent=4)
#writing content in json file
with open(json_file, 'w') as file:
    json.dump(result['Entities'], file)


