from PIL import Image
import os

def resize_images(folder_path, target_width=1000):
    # Ensure the folder path exists
    if not os.path.exists(folder_path):
        print(f"Error: The folder '{folder_path}' does not exist.")
        return
    
    # Get a list of all files in the folder
    files = os.listdir(folder_path)
    
    for file_name in files:
        file_path = os.path.join(folder_path, file_name)
        
        try:
            # Open the image file
            img = Image.open(file_path)
            
            # Resize the image while preserving aspect ratio
            width_percent = (target_width / float(img.size[0]))
            height = int((float(img.size[1]) * float(width_percent)))
            img = img.resize((target_width, height), Image.ANTIALIAS)
            
            # Save the resized image, overwriting the original
            img.save(file_path)
            
            print(f"Resized {file_name} successfully.")
        
        except Exception as e:
            print(f"Error resizing {file_name}: {e}")

# Example usage:
folder_path = 'C:\\Store\\BacLieu\\public_html\\photos\\xuan2025'
resize_images(folder_path)
