function changeText()
{
    const show_or_hide_btn = document.getElementById('show_or_hide_btn');

    if(show_or_hide_btn.innerText === "Show Answer") // if the answer is hidden
    {   
        show_or_hide_btn.innerText = "Hide Answer";
    }
    else // if the answer is visible / shown
    {
        show_or_hide_btn.innerText = "Show Answer";
    }
}

let last_selected_option_id = "";

function highlightSelection(id)
{
    if(last_selected_option_id !== "")
    {
        const prev_selected_option_container = document.getElementById("border_container"+last_selected_option_id);

        prev_selected_option_container.style.borderColor = "grey";
    }

    const section = document.getElementById("border_container"+id);

    section.style.borderColor = "dodgerblue";

    last_selected_option_id = id;
}

const confirmSubmit = () => {

    if(confirm("Are you sure you want to submit this Quiz ?")) {

        document.getElementById("submit-quiz-submit-button").click();
    }
};