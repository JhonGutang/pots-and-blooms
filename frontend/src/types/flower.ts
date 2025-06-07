export interface FlowerType {
    name: string,
    description: string,
    price: number,
    imageFile?: File | null,
}


export interface OccassionsType {
    name: string,
    flowerImg: string,
    description: string,
}