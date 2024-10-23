<style>
:root {
    --primary-color: hsl(26, 100%);
}

.container {
    max-width: 1440px;
}

.prod-detail {
    display: flex;
    flex-direction: row;
    gap: 80px;
    padding: 100px 220px;
    justify-content: center;
}

.prod-action {
    display: flex;
    gap: 10px;
}

.h-50 {
    height: 50px;
}

.prod-action {
    margin-top: 30px;
}

.prod-action>.add-to-cart-btn {
    background-color: hsl(26, 100%, 55%);
    color: white;
    border-radius: 5px;
    border-color: transparent;
    width: 320px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 50px;
}

.prod-name {
    font-size: 25px;
}

.prod-qty-selector input {
    width: 75px;
    border: 0;
    background: hsl(223, 64%, 98%);
    text-align: center;
}

.prod-qty-selector button {
    width: 30px;
    border: 0;
    background: hsl(223, 64%, 98%);
    text-align: center;
}

.prod-qty-right-left {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}

.prod-qty-right-right {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}

button:hover {
    cursor: pointer;
}

.discount {
    font-weight: 700;
    font-size: large;
    background-color: hsl(25, 100%, 94%);
    color: hsl(26, 100%, 55%);
    border-radius: 5px;
    padding: 2px 5px 2px 5px;
}

.prod-actual-price {
    margin-right: 5px;
    font-size: x-large;
    font-weight: 600;
}

.prod-desc {
    font-size: 16px;
    line-height: 30px;
    font-weight: 200;
}
</style>
<template>
    <div class="container">
        <div class="prod-detail">
            <div class="prod-slider">
                <img style="border-radius: 10px;" src="/images/image-product-1.jpg" alt="">
                <div style="display: flex;justify-content: space-between;margin-top: 25px;">
                    <img style="border-radius: 10px;height: 100px;width: 100px;"
                        v-for="(image, index) in product?.images" key="index" :src="image" alt="">
                </div>
            </div>
            <div class="prod-info">
                <div class="prod-name">
                    <h1>{{ product?.name }}</h1>
                </div>
                <div class="prod-desc">
                    <p>{{ product?.description }}</p>
                </div>
                <div class="prod-pricing">
                    <div>
                        <span class="prod-actual-price">$ {{ product?.price?.discounted }}</span>
                        <span class="discount">{{ Math.round(product?.discount?.amount) }} %</span>
                    </div>
                    <div style="margin-top: 10px;">
                        <span style="font-weight: 300;">
                            <strike> $ {{ product?.price?.full }}</strike>
                        </span>
                    </div>
                </div>
                <div class="prod-action">
                    <div class="prod-qty-selector">
                        <button class="prod-qty-right-left h-50" v-on:click="decrement">
                            <svg width="12" height="4" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <path
                                        d="M11.357 3.332A.641.641 0 0 0 12 2.69V.643A.641.641 0 0 0 11.357 0H.643A.641.641 0 0 0 0 .643v2.046c0 .357.287.643.643.643h10.714Z"
                                        id="a" />
                                </defs>
                                <use fill="#FF7E1B" fill-rule="nonzero" xlink:href="#a" />
                            </svg>
                        </button>
                        <input class="h-50" type="text" v-model=quantity readonly>
                        <button class="prod-qty-right-right h-50" v-on:click="increment">
                            <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <path
                                        d="M12 7.023V4.977a.641.641 0 0 0-.643-.643h-3.69V.643A.641.641 0 0 0 7.022 0H4.977a.641.641 0 0 0-.643.643v3.69H.643A.641.641 0 0 0 0 4.978v2.046c0 .356.287.643.643.643h3.69v3.691c0 .356.288.643.644.643h2.046a.641.641 0 0 0 .643-.643v-3.69h3.691A.641.641 0 0 0 12 7.022Z"
                                        id="b" />
                                </defs>
                                <use fill="#FF7E1B" fill-rule="nonzero" xlink:href="#b" />
                            </svg>
                        </button>
                    </div>
                    <button class="add-to-cart-btn" v-on:click="addToCart">
                        <svg width="22" height="20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.925 3.641H3.863L3.61.816A.896.896 0 0 0 2.717 0H.897a.896.896 0 1 0 0 1.792h1l1.031 11.483c.073.828.52 1.726 1.291 2.336C2.83 17.385 4.099 20 6.359 20c1.875 0 3.197-1.87 2.554-3.642h4.905c-.642 1.77.677 3.642 2.555 3.642a2.72 2.72 0 0 0 2.717-2.717 2.72 2.72 0 0 0-2.717-2.717H6.365c-.681 0-1.274-.41-1.53-1.009l14.321-.842a.896.896 0 0 0 .817-.677l1.821-7.283a.897.897 0 0 0-.87-1.114ZM6.358 18.208a.926.926 0 0 1 0-1.85.926.926 0 0 1 0 1.85Zm10.015 0a.926.926 0 0 1 0-1.85.926.926 0 0 1 0 1.85Zm2.021-7.243-13.8.81-.57-6.341h15.753l-1.383 5.53Z"
                                fill="#FFFFFF" fill-rule="nonzero" />
                        </svg>
                        <span style="margin-left: 5px;">Add To cart</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            product: null,
            quantity: 1
        }
    },
    mounted() {
        this.getProductDetail();
    },
    methods: {
        getProductDetail: async function () {
            const product = await fetch(`/api/products/${this.$route.params.slug}`)
                .then(res => res.json())
                .then((res) => this.product = res.data);

            if (!product) {
                return this.$router.push('/404')
            }

        },
        increment: function () {
            this.quantity++;
        },
        decrement: function () {
            this.quantity--;
        },
        addToCart: function () {
            alert('Product has beed added to cart')
        }
    }
}
</script>