// ...existing code...

function removeDuplicateProducts(products) {
    const uniqueProducts = [];
    const productIds = new Set();

    for (const product of products) {
        if (!productIds.has(product.id)) {
            uniqueProducts.push(product);
            productIds.add(product.id);
        }
    }

    return uniqueProducts;
}

// Example usage
const inventoryProducts = [
    // ...existing inventory products...
];
const uniqueInventoryProducts = removeDuplicateProducts(inventoryProducts);

// ...existing code...