window.onload = function () {
    let stars = document.querySelectorAll('.star');
    stars.forEach(function(star){
      star.addEventListener('mouseup', setRating);
    });

    let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
    let target = stars[rating-1];
    target.dispatchEvent(new MouseEvent('mouseup'));
    
    
};

function setRating(ev){
    let span = ev.currentTarget;
    let stars = document.querySelectorAll('.star');
    let match = false;
    let num = 0;
    
    stars.forEach(function(star, index){
        if (match) {
            star.classList.remove('rated');
        } else {
            star.classList.add('rated');
        }
        if (star == span){
            match = true;
            num = (index + 1);
        }
    })
    document.querySelector('.stars').setAttribute('data-rating', num);
    console.log(num);
    document.getElementById("verborgenAantalSterren").value = num;
    
    
    let legeSter = "\u{2606}";
    let volleSter = "\u{2605}";
    
    /*for (let teller = 0; teller < 5; teller ++){
        let variabele = "sterRating" + parseInt([teller+1]);
        let rating = document.getElementById(variabele);
        console.log(rating);
        switch (variabele) {
            case ("sterRating1"): 
                rating.innerHTML = volleSter + legeSter + legeSter + legeSter + legeSter;
                break;
             case ("sterRating2"): 
                rating.innerHTML = volleSter + volleSter + legeSter + legeSter + legeSter;
                break;
            case ("sterRating3"): 
                rating.innerHTML = volleSter + volleSter + volleSter + legeSter + legeSter;
                break;
            case ("sterRating4"): 
                rating.innerHTML = volleSter + volleSter + volleSter + volleSter + legeSter;
                break;
            case ("sterRating5"): 
                rating.innerHTML = volleSter + volleSter + volleSter + volleSter + volleSter;
                break;
            
        }
    }*/
    
    let rating = document.getElementsByClassName("rating");
    var arrayLengte = rating.length;
    for (let teller = 0; teller < arrayLengte; teller ++) {
        switch (rating[teller].innerHTML) {
            case ("1"): 
                rating[teller].innerHTML = volleSter + legeSter + legeSter + legeSter + legeSter;
                break;
             case ("2"): 
                rating[teller].innerHTML = volleSter + volleSter + legeSter + legeSter + legeSter;
                break;
            case ("3"): 
                rating[teller].innerHTML = volleSter + volleSter + volleSter + legeSter + legeSter;
                break;
            case ("4"): 
                rating[teller].innerHTML = volleSter + volleSter + volleSter + volleSter + legeSter;
                break;
            case ("5"): 
                rating[teller].innerHTML = volleSter + volleSter + volleSter + volleSter + volleSter;
                break;

            }
    }
    
}

