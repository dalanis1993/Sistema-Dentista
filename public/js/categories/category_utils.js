function dropdownHandler(event) {
  event.preventDefault();

  let listItem = $(this); // Obtener el <li>
  let dataId = listItem.data("id"); // Obtener el valor de data-id

  let iconElement = listItem.find("i");

  let iconClass = iconElement.length
    ? iconElement.attr("class").split(" ")[1]
    : "";

  $("#dropdownMenuButton").html(
    '<i class="fa ' + iconClass + '"></i> ' + listItem.text()
  );
  $("#selectedIcon").val(dataId); // Guarda el valor en el input oculto
}

async function confirmCategoryDelete(e) {
  e.preventDefault();

  const id = $(e.currentTarget).data("id");
  const isConfirmed = await SwalHandler.confirm(
    `¿Confirma eliminar la Categoria con ID: ${id}?`,
    "Eliminar Categoria"
  );

  if (!isConfirmed) return;

  try {
    const response = await fetch(`${base_url}categories/${id}`, {
      method: "DELETE",
      headers: {
        "X-CSRF-TOKEN": csrf,
        "Content-Type": "application/json",
      },
    });

    if (!response.ok) {
      const errorText = await response.text();
      throw new Error(`Error al eliminar la Categoria: ${errorText}`);
    }

    location.reload();
  } catch (error) {
    console.log(error);
    SwalHandler.error(error);
  }
}

async function confirmEditCategory(e) {
  e.preventDefault();

  const id = $(e.currentTarget).data("id");
  const isConfirmed = await SwalHandler.confirm(
    `¿Confirma, Editar la Categoria con ID: ${id}?`,
    "Editar Categoria"
  );

  if (!isConfirmed) return;

  let formDataArray = $(this).serializeArray(); // Serializa los datos en un array de objetos [{name: "campo", value: "valor"}]
  let jsonData = {}; // Convertimos el array a un objeto JSON
  $.each(formDataArray, function (_, field) {
    console.log(field.value);
    jsonData[field.name] = field.value;
  });

  try {
    const response = await fetch(`${base_url}categories/${id}`, {
      method: "PUT",
      headers: {
        "X-CSRF-TOKEN": csrf,
        "Content-Type": "application/json",
      },
      body: JSON.stringify(jsonData),
    });

    if (!response.ok) {
      const errorText = await response.text();
      throw new Error(`Error al editar la Categoria: ${errorText}`);
    }

    location.reload();
  } catch (error) {
    console.log(error);
    SwalHandler.error(error);
  }
}
