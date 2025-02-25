$(document).ready(function () {
    $(".dropdown-item").on("click", function (event) {
        event.preventDefault();

        let listItem = $(this); // Obtener el <li>
        console.log(listItem);
        let dataId = listItem.data("id"); // Obtener el valor de data-id del <li>
        console.log(dataId);

        let iconElement = $(this).find("i");
        let iconClass = iconElement.length ? iconElement.attr("class").split(" ")[1] : "";
        console.log(iconClass);

        $("#dropdownMenuButton").html('<i class="fa ' + iconClass + '"></i> ' + $(this).text());
        $("#selectedIcon").val(dataId); // Guarda el valor de data-id en el input oculto
    });
});
