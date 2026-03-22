export const loader = async () => {
    const res = await fetch('https://api.github.com/users/hiteshchoudhary');
    const data = await res.json();
    return data;
}