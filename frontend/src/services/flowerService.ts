import axios from "axios"

export const flowerService = () => {

    const storeFlower = async(postData: FormData) => {
        const response = await axios.post('flowers', postData)
        console.log(response.data);
    }


    return {
        storeFlower
    }
}