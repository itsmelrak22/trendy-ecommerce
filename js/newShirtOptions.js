const customizePrices = {
    printed: {
        '3x3': { xs: 140, s: 145, m: 155, l: 165, xl: 175, xxl: 185 },
        '4x4': { xs: 160, s: 165, m: 175, l: 185, xl: 195, xxl: 205 }
    },
    embroidered: {
        '3x3': { xs: 150, s: 155, m: 165, l: 175, xl: 185, xxl: 195 },
        '4x4': { xs: 170, s: 175, m: 185, l: 195, xl: 205, xxl: 215 }
    }
};

const newShirtOptions = {
    "Short Sleeve Shirts": customizePrices,
    "Polo Shirts": customizePrices,
    "Long Sleeve Shirts": {
        printed: {
            '3x3': { xs: 150, s: 165, m: 170, l: 180, xl: 190, xxl: 200 },
            '4x4': { xs: 155, s: 170, m: 175, l: 185, xl: 195, xxl: 205 }
        },
        embroidered: {
            '3x3': { xs: 155, s: 170, m: 175, l: 185, xl: 195, xxl: 195 },
            '4x4': { xs: 160, s: 175, m: 185, l: 195, xl: 205, xxl: 215 }
        }
    },
    "Hoodies": {
        printed: {
            '3x3': { xs: 150, s: 165, m: 170, l: 180, xl: 190, xxl: 200 },
            '4x4': { xs: 155, s: 170, m: 175, l: 185, xl: 195, xxl: 205 }
        },
        embroidered: {
            '3x3': { xs: 155, s: 170, m: 175, l: 185, xl: 195, xxl: 195 },
            '4x4': { xs: 160, s: 175, m: 185, l: 195, xl: 205, xxl: 215 }
        }
    },
    "Tank tops": {
        printed: {
            '3x3': { xs: 70, s: 80, m: 90, l: 100, xl: 110, xxl: 120 },
            '4x4': { xs: 80, s: 85, m: 95, l: 105, xl: 115, xxl: 125 }
        },
        embroidered: {
            '3x3': { xs: 80, s: 90, m: 100, l: 110, xl: 115, xxl: 125 },
            '4x4': { xs: 90, s: 95, m: 105, l: 115, xl: 120, xxl: 130 }
        }
    }
};

console.log(newShirtOptions);
