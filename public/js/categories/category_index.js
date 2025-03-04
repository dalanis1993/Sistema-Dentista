$(function () {
    $(document).on("click", ".delete-category-button", confirmCategoryDelete);

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
});