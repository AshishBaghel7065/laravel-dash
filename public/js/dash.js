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






function fetchAchievement(id) {
    fetch(`/dashboard/achievement/${id}`)   
        .then(response => response.json())
        .then(data => {
            document.getElementById('modal-title').textContent = data.title;
            document.getElementById('modal-count').textContent = data.count;

            document.getElementById('achievementModal').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        })
        .catch(error => console.error('Error fetching achievement:', error));
}

