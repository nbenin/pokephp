// Activate buttons
(function() {
    let descriptionCount = 0;
    let DESCRIPTIONDIV = document.getElementById('description');
    let EVOLUTIONDIV = document.getElementById('evolution');
    let MOVESDIV = document.getElementById('moves');

    EVOLUTIONDIV.style.display = 'none';
    MOVESDIV.style.display = 'none';

    document.getElementById('nextButton').addEventListener('click', function () {
        if (descriptionCount === 0) {
            descriptionCount++;
            DESCRIPTIONDIV.style.display = 'none';
            EVOLUTIONDIV.style.display = 'none';
            MOVESDIV.style.display = 'block';
        } else if (descriptionCount === 1) {
            descriptionCount++;
            MOVESDIV.style.display = 'none';
            DESCRIPTIONDIV.style.display = 'none';
            EVOLUTIONDIV.style.display = 'block';
        } else {
            descriptionCount = 0;
            EVOLUTIONDIV.style.display = 'none';
            MOVESDIV.style.display = 'none';
            DESCRIPTIONDIV.style.display = 'block';
        }
    });

    document.getElementById('prevButton').addEventListener('click', function () {

        if (descriptionCount === 0) {
            descriptionCount = 2;
            DESCRIPTIONDIV.style.display = 'none';
            MOVESDIV.style.display = 'none';
            EVOLUTIONDIV.style.display = 'block';
        } else if (descriptionCount === 2) {
            descriptionCount--;
            DESCRIPTIONDIV.style.display = 'none';
            EVOLUTIONDIV.style.display = "none";
            MOVESDIV.style.display = 'block'
        } else {
            descriptionCount--;
            MOVESDIV.style.display = 'none';
            EVOLUTIONDIV.style.display = "none";
            DESCRIPTIONDIV.style.display = 'block';
        }
    });
})();