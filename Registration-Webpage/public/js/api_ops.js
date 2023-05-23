const actors = document.querySelector(".actor");
const date = document.getElementById("date")
const matched_actors_end_points = []
const matched_actors_bio = []
const imdb_actor_pages = []

const api_key = 'bfa74c0e92msha24ddf0b21fcb21p15420fjsn9332a34bd595';
const base_url = 'https://imdb8.p.rapidapi.com/actors/list-born-today?'



function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function getAllActors(event) {


    event.preventDefault(); // prevent form from submitting
    const val = date.value.split("-");
    let month = val[1];
    let day = val[2];

    // remove trilling 0 from months and days  like 07
    if (month[0] === '0') {
        month = month[1];
    }
    if (day[0] === '0') {
        day = day[1];
    }
    const end_point = `${base_url}month=${month}&day=${day}`;

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.open('GET', end_point, true);
    xmlhttp.setRequestHeader('X-RapidAPI-Key', 'bfa74c0e92msha24ddf0b21fcb21p15420fjsn9332a34bd595');
    xmlhttp.setRequestHeader('X-RapidAPI-Host', 'imdb8.p.rapidapi.com');

    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let response = JSON.parse(this.responseText);
            processResonse(response);
        }
    }
    xmlhttp.send();
}

async function processResonse(response) {
    for (let i = 0; i < response.length; i++) {
        matched_actors_end_points.push(response[i]);
    }

    if (matched_actors_end_points) {
        actors.innerHTML = "";
        for (let i = 0; i < matched_actors_end_points.length; i++) {

            // url of actor page in imdb
            imdb_actor_pages.push(`https://www.imdb.com/${matched_actors_end_points[i]}`)

            const val = matched_actors_end_points[i].split("/");
            const name_id = val[2];
            const bio_end_point = `https://imdb8.p.rapidapi.com/actors/get-bio?nconst=${name_id}`;
            sendRequest(bio_end_point, i);
            await sleep(1000);

        }
    }
}
const actorsBtn = document.getElementById("actorsID")
actorsBtn.addEventListener("click", getAllActors);


function sendRequest(bio_end_point, i) {
    let xmlhttp2 = new XMLHttpRequest();


    xmlhttp2.onreadystatechange = function () {

        if (this.readyState === 4 && this.status === 200) {
            let data = JSON.parse(this.responseText);
            matched_actors_bio.push(data);
            let card = createActorCard(data, imdb_actor_pages[i]);
            actors.append(card);
        }
    };
    xmlhttp2.open('GET', bio_end_point, true);
    xmlhttp2.setRequestHeader('X-RapidAPI-Key', 'bfa74c0e92msha24ddf0b21fcb21p15420fjsn9332a34bd595');
    xmlhttp2.setRequestHeader('X-RapidAPI-Host', 'imdb8.p.rapidapi.com');
    xmlhttp2.send();
}

function createActorCard(actorInfo, link) {
    let lst = actorInfo['legacyNameText'].split(', ');
    const actor_name = `${lst[1]} ${lst[0]}`;

    const card = document.createElement("div");
    const details = document.createElement("div");
    const title = document.createElement("h2");
    const date = document.createElement("p");
    const place = document.createElement("p");
    const gender = document.createElement("p");
    const a = document.createElement("a");
    const img = document.createElement("img");
    const title_text = document.createTextNode(actor_name);
    const date_text = document.createTextNode(`${actorInfo['birthDate']}`);
    const place_text = document.createTextNode(`${actorInfo['birthPlace']}`);
    const link_text = document.createTextNode('IMDB Page');
    const gender_text = document.createTextNode(`${actorInfo['gender']}`);
    const img_src = actorInfo['image']['url'];

    card.classList.add('actor-card');
    img.setAttribute('src', img_src);
    img.setAttribute('alt', actor_name);
    card.append(img);

    details.classList.add('details');
    title.appendChild(title_text);
    title.classList.add('actor-name');
    details.appendChild(title);


    date.appendChild(date_text);
    date.classList.add('birth-date');
    details.appendChild(date);

    place.appendChild(place_text);
    place.classList.add('birth-place');
    details.appendChild(place);

    gender.appendChild(gender_text);
    gender.classList.add('gender');
    details.appendChild(gender);

    a.classList.add('imdb-link');
    a.appendChild(link_text);
    a.setAttribute('href', link)
    details.appendChild(a);

    card.appendChild(details);
    return card;
}


