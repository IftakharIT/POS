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
const cartProducts = [
    // ...existing cart products...
];
const uniqueCartProducts = removeDuplicateProducts(cartProducts);

// ...existing code...
