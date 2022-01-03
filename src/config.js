// config.js
// @Author: lym12321
// @Date: 2021/12/25
// Merry Christmas!!

const title = {
    data(){
        return{
            title: 'uploadPage - 测试页面'
        }
    }
}
Vue.createApp(title).mount('#title');

const notice = {
    data(){
        return{
            seen: true,
            text: '此页面仅供测试使用！'
        }
    }
}
Vue.createApp(notice).mount('#notice');

const list = {
    data(){
        return{
            inputName: outName,
            items: [
                {
                    id: 1,
                    title: '测试图片1',
                    uploaded: false,
                    imgSrc: ''
                },
                {
                    id: 2,
                    title: '测试图片2',
                    uploaded: false,
                    imgSrc: ''
                },
                {
                    id: 3,
                    title: '测试图片3',
                    uploaded: false,
                    imgSrc: ''
                },
                {
                    id: 4,
                    title: '测试图片4',
                    uploaded: false,
                    imgSrc: ''
                }
            ]
        
        }
    },

    methods: {
        check(name, id){
            let tmp = this.items[id-1];
            if(name.length < 2 || name.length > 4){
                // 当 name 明显不合法的时候，直接进行判断
                tmp.uploaded = false;
                return;
            }
            axios.get("getImage.php?name="+name+"-"+id).then((res)=>{
                if(res.data.code == 1){
                    tmp.uploaded = true;
                    tmp.imgSrc = res.data.message;
                }else{
                    tmp.uploaded = false;
                }
            })
            
        },
        upload($event, name, id){
            var file = event.target.files[0];
            var formData = new FormData();
            formData.append('file', file);
            formData.append('name', name);
            formData.append('id', id);
            let config = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };
            // Vue 不能用 ajax ！！！ 要用 axios
            axios.post("upload.php", formData, config).then((res)=>{
                // console.log(res);
                if(res.data.success == true){
                    // location.reload();
                    window.location.href="https://dev.dawn-light.cn/upload/?name="+name;
                }else alert(res.data.message);
            }).catch((err)=>{
                alert("你遇到了不明原因的上传失败，请把 lym12321 拽过来修 bug.");
            })
        }
    }
}
Vue.createApp(list).mount('#list');
