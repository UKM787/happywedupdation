<template>
    <div>
        <div v-if="ceramonies.length > 0" class="guest-invi-ceramony">
            <h3>Wedding ceremonies</h3>
            <h2>Accept Invitation to choose Members to the ceremonies</h2>
            <div class="cera-view-cont">
                <div
                    v-for="item in ceramonies"
                    :key="item.id"
                    class="cere-view-single"
                    @click="selectCeremony(item)"
                >
                    <div class="cere-single-image-cont">
                        <img
                            :src="
                                typeof item.imageOne === 'string' 
                                ? '/assets/defaults/ceramonies/images/' + item.imageOne
                                : item.imageOne?.path || '/assets/defaults/ceramonies/ceramonyDefault.png'
                            "
                            alt=""
                        />
                    </div>
                    <div class="cere-view-info">
                        <h3>{{ titleCase(item.name) }}</h3>
                        <div class="cere-view-info-time">
                            <div>
                                <img
                                    src="/assets/ceramonies/calendar.svg"
                                    alt=""
                                />
                            </div>
                            <div>
                                <div>
                                    {{
                                        new Date(
                                            item.startDate
                                        ).toLocaleDateString("en-us", {
                                            weekday: "long",
                                            year: "numeric",
                                            month: "long",
                                            day: "numeric",
                                        })
                                    }}
                                </div>
                                <div>
                                    {{
                                        new Date(
                                            "1970-01-01T" + item.startTime + "Z"
                                        ).toLocaleTimeString("en-US", {
                                            timeZone: "UTC",
                                            hour12: true,
                                            hour: "numeric",
                                            minute: "numeric",
                                        })
                                    }}
                                </div>
                            </div>
                        </div>
                        <div class="cere-view-info-time">
                            <div>
                                <img
                                    src="/assets/ceramonies/map-pin.svg"
                                    alt=""
                                />
                            </div>
                            <div>
                                <div v-for="e in item.venues" :key="e.name">
                                    {{ e.name }}
                                    <template v-if="e.address">, {{ e.address }}</template>
                                    <template v-if="e.pincode">, {{ e.pincode }}</template>
                                    <template v-if="e.city">, {{ e.city }}</template>
                                    <template v-if="e.state">, {{ e.state }}</template>
                                    <template v-if="e.location && e.location.name">, {{ e.location.name }}</template>
                                    <template v-if="e.location && e.location.state && e.location.state.name">, {{ e.location.state.name }}</template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                v-if="popupCera"
                class="cere-popup-container"
                @click="popupCera = null"
            >
                <component
                    @ceraClose="popupCera = null"
                    :ceremony="popupCera"
                    :groomName="invitation.groomName"
                    :brideName="invitation.brideName"
                    :invi="invitation"
                    v-bind:is="ceremonyCard"
                ></component>
            </div>
        </div>
    </div>
</template>

<script>
import CardDefault from "./ceremonyCards/CardDefault.vue";
import CardMehendi from "./ceremonyCards/CardMehendi.vue";
import CardRoka from "./ceremonyCards/CardRoka.vue";
import CardEngagement from "./ceremonyCards/CardEngagement.vue";
import CardSangeet from "./ceremonyCards/CardSangeet.vue";
import CardHaldi from "./ceremonyCards/CardHaldi.vue";
import CardReception from "./ceremonyCards/CardReception.vue";
import CardCustom from "./ceremonyCards/CardCustom.vue";
import CardTilak from "./ceremonyCards/CardTilak.vue";
import CardSagan from "./ceremonyCards/CardSagan.vue";
import CardWedding from "./ceremonyCards/CardWedding.vue";

export default {
    components: {
        CardDefault,
        CardMehendi,
        CardRoka,
        CardEngagement,
        CardSangeet,
        CardHaldi,
        CardReception,
        CardCustom,
        CardTilak,
        CardSagan,
        CardWedding,
    },
    props: ["ceramonies", "invitation"],
    data() {
        return {
            popupCera: null,
        };
    },
    mounted() {
        console.log('Ceremonies:', this.ceramonies);
        console.log('Invitation:', this.invitation);
    },
    methods: {
        titleCase(str) {
            let _this = this;
            var splitStr = str.toLowerCase().split(" ");
            for (var i = 0; i < splitStr.length; i++) {
                // You do not need to check if i is larger than splitStr length, as your for does that for you
                // Assign it back to the array
                splitStr[i] =
                    splitStr[i].charAt(0).toUpperCase() +
                    splitStr[i].substring(1);
            }
            // Directly return the joined string
            return splitStr.join(" ");
        },
        selectCeremony(item) {
            // Create a copy of the item to avoid modifying the original
            const ceremonyItem = { ...item };
            
            // Set the file property based on the ceremony name
            const name = ceremonyItem.name.toLowerCase();
            console.log('Ceremony name for selection:', name);
            
            if (name.includes('wedding')) {
                ceremonyItem.file = 'CardWedding';
                console.log('Setting file to CardWedding');
            } else if (name.includes('mehendi')) {
                ceremonyItem.file = 'CardMehendi';
            } else if (name.includes('roka')) {
                ceremonyItem.file = 'CardRoka';
            } else if (name.includes('engagement')) {
                ceremonyItem.file = 'CardEngagement';
            } else if (name.includes('sangeet')) {
                ceremonyItem.file = 'CardSangeet';
            } else if (name.includes('haldi')) {
                ceremonyItem.file = 'CardHaldi';
            } else if (name.includes('reception')) {
                ceremonyItem.file = 'CardReception';
            } else if (name.includes('tilak')) {
                ceremonyItem.file = 'CardTilak';
            } else if (name.includes('sagan')) {
                ceremonyItem.file = 'CardSagan';
            } else {
                ceremonyItem.file = 'CardDefault';
            }
            
            this.popupCera = ceremonyItem;
            console.log('Selected ceremony with file:', ceremonyItem.file);
        }
    },
    computed: {
        ceremonyCard() {
            console.log('Popup ceremony:', this.popupCera);
            
            // If file is not set, determine the card type based on the ceremony name
            if (!this.popupCera.file) {
                const name = this.popupCera.name.toLowerCase();
                console.log('Ceremony name:', name);
                let cardType = 'CardDefault';
                
                if (name.includes('wedding')) {
                    cardType = 'CardWedding';
                    console.log('Identified as wedding ceremony');
                } else if (name.includes('mehendi')) {
                    cardType = 'CardMehendi';
                } else if (name.includes('roka')) {
                    cardType = 'CardRoka';
                } else if (name.includes('engagement')) {
                    cardType = 'CardEngagement';
                } else if (name.includes('sangeet')) {
                    cardType = 'CardSangeet';
                } else if (name.includes('haldi')) {
                    cardType = 'CardHaldi';
                } else if (name.includes('reception')) {
                    cardType = 'CardReception';
                } else if (name.includes('tilak')) {
                    cardType = 'CardTilak';
                } else if (name.includes('sagan')) {
                    cardType = 'CardSagan';
                }
                
                console.log('Selected card type:', cardType);
                return cardType;
            }
            console.log('Using file property:', this.popupCera.file);
            return this.popupCera.file;
        },
    },
};
</script>

<style scoped>
.guest-invi-ceramony {
    background-image: url("/assets/guestInvi/cera-back.png");
    background-repeat: no-repeat;
    background-position: top left;
    padding: 68px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.guest-invi-ceramony > h3 {
    font-family: "Perpetua";
    font-style: normal;
    font-weight: 700;
    font-size: 29.5136px;
    line-height: 34px;
    color: #333333;
    margin-bottom: 15px;
}
.guest-invi-ceramony > h2 {
    font-family: "Poppins";
    font-style: normal;
    font-weight: 400;
    font-size: 14.5337px;
    line-height: 22px;
    color: #000000;
    margin-bottom: 15px;
    text-align: center;
}
.cera-view-cont {
    overflow-x: scroll;
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
    display: flex;
    width: 100%;
    padding: 10px;
}
.cera-view-cont::-webkit-scrollbar {
    display: none;
}
.cere-view-single {
    background: #ffffff;
    border: 0.575294px solid #9c9797;
    border-radius: 8.05411px;
    padding: 10px;
    min-width: 230px;
    margin-right: 15px;
    max-width: 300px;
    width: 100%;
}
.cere-single-image-cont {
    position: relative;
    padding-top: 80%;
}
.cere-single-image-cont > img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.cere-single-image-cont > div {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 99999;
}
.cere-view-info {
    margin-top: 15px;
}
.cere-view-info > h3 {
    font-family: "Perpetua";
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 21px;
    margin-bottom: 10px;
    color: #461952;
}
.cere-view-info-time {
    display: flex;
    align-items: baseline;
}
.cere-view-info-time > div:nth-child(1) {
    margin-right: 10px;
}
.cere-view-info-time > div:nth-child(2) {
    font-family: "Poppins", sans-serif;
    font-style: normal;
    font-weight: 300;
    font-size: 10.2px;
    line-height: 15px;
    color: #31373a;
}
.cere-popup-container {
    background: rgba(38, 38, 38, 0.8);
    position: fixed;
    width: 100vw;
    height: 100vh;
    top: 0;
    z-index: 999999;
    display: flex;
    justify-content: center;
    overflow-y: auto;
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
    padding: 10px;
}
.cere-popup-container::-webkit-scrollbar {
    display: none;
}
@media screen and (max-width: 576px) {
    .guest-invi-ceramony {
        padding: 68px 21px;
    }
}
</style>
