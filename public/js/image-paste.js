function setupImagePaste(inputElement, previewElement) {
    // Hide the original file input
    inputElement.style.display = 'none';
    
    // Create a container for both paste area and file input
    const container = document.createElement('div');
    container.className = 'space-y-2';
    
    // Create a paste target area
    const pasteArea = document.createElement('div');
    pasteArea.className = 'border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition-colors';
    pasteArea.innerHTML = `
        <div class="text-sm text-gray-500">
            <p>Paste image here (Ctrl+V or Cmd+V)</p>
        </div>
    `;
    
    // Create a file input wrapper
    const fileInputWrapper = document.createElement('div');
    fileInputWrapper.className = 'flex items-center justify-center';
    fileInputWrapper.innerHTML = `
        <label class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 cursor-pointer">
            <span>Choose File</span>
            <input type="file" class="hidden" accept="image/*">
        </label>
    `;
    
    // Insert the container before the original input
    inputElement.parentNode.insertBefore(container, inputElement);
    container.appendChild(pasteArea);
    container.appendChild(fileInputWrapper);
    
    // Handle paste event on the paste area
    pasteArea.addEventListener('paste', function(e) {
        e.preventDefault();
        handleImagePaste(e, inputElement, previewElement);
    });

    // Handle file input change
    const fileInput = fileInputWrapper.querySelector('input[type="file"]');
    fileInput.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewElement.innerHTML = `<img src="${e.target.result}" class="max-w-xs mb-2">`;
                // Set the file to the original input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(this.files[0]);
                inputElement.files = dataTransfer.files;
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
}

function handleImagePaste(e, inputElement, previewElement) {
    const items = e.clipboardData.items;
    
    for (let i = 0; i < items.length; i++) {
        if (items[i].type.indexOf('image') !== -1) {
            const file = items[i].getAsFile();
            const reader = new FileReader();
            
            reader.onload = function(e) {
                // Create a preview
                previewElement.innerHTML = `<img src="${e.target.result}" class="max-w-xs mb-2">`;
                
                // Create a new File object and set it to the input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                inputElement.files = dataTransfer.files;
            };
            
            reader.readAsDataURL(file);
            break;
        }
    }
}

// Initialize image paste functionality for all image inputs
document.addEventListener('DOMContentLoaded', function() {
    // Question image
    const questionImageInput = document.getElementById('question_image');
    const questionImagePreview = document.getElementById('question_image_preview');
    if (questionImageInput && questionImagePreview) {
        setupImagePaste(questionImageInput, questionImagePreview);
    }

    // Option images
    for (let i = 0; i < 4; i++) {
        const optionImageInput = document.getElementById(`options_${i}_image`);
        const optionImagePreview = document.getElementById(`options_${i}_image_preview`);
        if (optionImageInput && optionImagePreview) {
            setupImagePaste(optionImageInput, optionImagePreview);
        }
    }
}); 