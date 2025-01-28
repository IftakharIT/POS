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
const products = [
    // ...existing products...
];
const uniqueProducts = removeDuplicateProducts(products);

// ...existing code...
