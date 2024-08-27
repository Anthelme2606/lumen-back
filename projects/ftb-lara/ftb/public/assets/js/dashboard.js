const teamH = document.getElementById("teamH");
const teamA = document.getElementById("teamA");

function createFormation(formation, element) {
  element.innerHTML = ""; // Clear previous formation
  const rows = formation.split(",");

  rows.forEach((players, index) => {
    const rowDiv = document.createElement("div");
    rowDiv.className = `row justify-content-center g-2`;

    for (let i = 0; i < players; i++) {
      const colDiv = document.createElement("div");
      colDiv.className = `col-auto`;
      const roundDiv = document.createElement("div");
      roundDiv.className = "round-50-frm";
      roundDiv.innerText = "J";
      colDiv.appendChild(roundDiv);
      rowDiv.appendChild(colDiv);
    }

    element.appendChild(rowDiv);
  });
}

// Example formation: 4-2-3-1
createFormation("1,3,3,2", teamH);
createFormation("2,3,3,1", teamA);