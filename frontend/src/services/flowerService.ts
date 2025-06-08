import axios from "axios"

export const flowerService = () => {

    const fetchAllFlowers = async () => {
        const response = await axios.get('flowers');
        return response.data.data
    }

    const storeFlower = async(postData: FormData) => {
        const response = await axios.post('flowers', postData)
        console.log(response.data);
    }


    return {
        fetchAllFlowers,
        storeFlower
    }
}