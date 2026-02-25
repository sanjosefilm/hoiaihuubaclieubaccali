from PIL import Image
import os

def get_image_heights(folder_path, output_file="image_heights.txt"):
    # Ensure the folder exists
    if not os.path.exists(folder_path):
        print(f"Error: The folder '{folder_path}' does not exist.")
        return

    # Open the output file in write mode
    with open(output_file, "w") as file:
        # Iterate through files in the folder
        for file_name in os.listdir(folder_path):
            file_path = os.path.join(folder_path, file_name)
            
            try:
                # Open the image
                with Image.open(file_path) as img:
                    height = img.size[1]  # Get height
                    file.write(f"{file_name}: {height} pixels\n")  # Write to file
                    print(f"{file_name}: {height} pixels")  # Print to console
            
            except Exception as e:
                print(f"Error processing {file_name}: {e}")

# Example usage
folder_path = 'C:\\Store\\BacLieu\\public_html\\photos\\xuan2025'  # Change to your image folder path
get_image_heights(folder_path)
