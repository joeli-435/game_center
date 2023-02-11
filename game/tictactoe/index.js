window.onload = function() {
    const cells = document.querySelectorAll('.cell');
    const turntext = document.getElementById('turn');
    let currentPlayerIsX = true;
    let filledCells = 0;
    

    function checkwin() {
        const wincondition = [
            [0, 1, 2],
            [3, 4, 5],
            [6, 7, 8],
            [0, 3, 6],
            [1, 4, 7],
            [2, 5, 8],
            [0, 4, 8],
            [2, 4, 6]
        ];

        for (let i = 0; i < wincondition.length; i++) {
            if (
                cells[wincondition[i][0]].textContent == cells[wincondition[i][1]].textContent &&
                cells[wincondition[i][0]].textContent == cells[wincondition[i][2]].textContent &&
                cells[wincondition[i][0]].textContent !== ''
            ) {
                alert(cells[wincondition[i][0]].textContent + ' Win!');
                setTimeout(function() {
                    location.reload();
                }, 5000);
            }
        }
    }

    for (let i = 0; i < 9; i++) {
        cells[i].addEventListener('click', function() {
            if (this.textContent === '') {
                if (currentPlayerIsX) {
                    this.textContent = 'X';
                    currentPlayerIsX = false;
                    turntext.textContent = 'Turn: O'

                } else {
                    this.textContent = 'O';
                    currentPlayerIsX = true;
                    turntext.textContent = 'Turn: X'
                }
                filledCells++;
            }
            checkwin();
            if (filledCells === 9) {
                alert('Draw!');
                setTimeout(function() {
                    location.reload();
                }, 3000);
            }
        });
    }
}