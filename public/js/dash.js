function toggleAside() {
    const aside = document.getElementById("aside");
    const screen = document.getElementById("screen");

    aside.classList.toggle("hidden");

    if (aside.classList.contains("hidden")) {
        screen.style.width = "100%";
    } else {
        screen.style.width = "calc(100% - 250px)";
    }
}






let deleteFaqId = null;

// Open the delete confirmation modal and set the FAQ ID
function openDeleteModal(id) {
    deleteFaqId = id;
    document.getElementById('deletePopup').style.display = 'block';
}

// Close the delete confirmation modal
function closeDeleteModal() {
    document.getElementById('deletePopup').style.display = 'none';
}

// Submit the delete form
function deleteFaqFromDatabase() {
    if (deleteFaqId) {
        // Find the form for the specific FAQ and submit it
        document.getElementById(`deleteForm${deleteFaqId}`).submit();
    }
}




function fetchFaq(id) {
    fetch(`/dashboard/faq/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('modal-question').textContent = data.question;
            document.getElementById('modal-answer').textContent = data.answer;
            document.getElementById('modal-written-by').textContent = data.written_by;

            document.getElementById('faqModal').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        })
        .catch(error => console.error('Error fetching FAQ:', error));
}

function closeModal() {
    document.getElementById('faqModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}