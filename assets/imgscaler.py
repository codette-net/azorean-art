from PIL import Image
import os

# Define the sizes and corresponding suffixes
sizes = [
    (1200, "xl"),
    (992, "large"),
    (768, "medium"),
    (480, "small"),
]

# Directory containing original images
input_dir = 'img/newsel/'
# Directory to save resized images
output_dir = 'img/photos'

if not os.path.exists(output_dir):
    os.makedirs(output_dir)

for filename in os.listdir(input_dir):
    if filename.endswith('.jpg') or filename.endswith('.jpeg') or filename.endswith('.png'):
        with Image.open(os.path.join(input_dir, filename)) as img:
            for size, suffix in sizes:
                # Calculate the new height to maintain the aspect ratio
                new_height = int(img.height * (size / img.width))
                img_resized = img.resize((size, new_height), Image.LANCZOS)
                base, ext = os.path.splitext(filename)
                img_resized.save(os.path.join(output_dir, f"{base}-{suffix}{ext}"))

print("Images resized successfully.")
