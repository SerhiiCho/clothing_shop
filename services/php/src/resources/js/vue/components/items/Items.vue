<template>
    <div class="row" v-if="items">
        <div v-for="(item, index) in items"
            :key="item.id"
            class="col-lg-3 col-6 item-card"
        >
            <transition name="fade" mode="out-in" appear>
                <a :href="'/item/' + item.category + '/' + item.slug"
                    :title="item.title"
                    v-if="item.photos.length > 0"
                    @mouseover="changePhotoOver(index, item.photos[1] ? item.photos[1].name : '')"
                    @mouseout="changePhotoOut(index, item.photos[0].name)"
                >
                    <img :src="'/storage/img/small/clothes/' + item.photos[0].name"
                        :alt="item.title"
                        :id="'photo' + index"
                    >
                </a>
                <a v-else :href="'/item/' + item.category + '/' + item.slug" :title="item.title">
                    <img src="/storage/img/small/clothes/default.jpg" :alt="item.title">
                </a>
            </transition>
            <div class="item-card-price">
                <span>{{ item.title }}</span>
                <span class="hryvnia">{{ item.price }} {{ hryvnia }}</span>

                <!-- Edit button -->
                <a v-if="admin == 1"
                    :href="'/items/' + item.slug + '/edit'"
                    :title="change"
                    class="btn-change-item"
                    style="top:10px;"
                >
                    <i class="fas fa-pencil-alt"></i>
                </a>

                <!-- Delete button -->
                <div v-if="admin == 1" class="btn-change-item" style="top:55px">
                    <delete-item-btn
                        :title="deleting"
                        :slug="item.slug"
                    ></delete-item-btn>
                </div>
            </div>
        </div>

        <!-- Load more -->
        <div class="col-12 text-center pt-5 pb-3" v-if="!theEnd">
            <div class="text-center" v-if="loading">
                <div class="loader mx-auto"></div>
            </div>
            <div v-else class="btn btn-sm btn-success" v-on:click="showMoreItems()">
                <i class="fas fa-sync-alt"></i> {{ showMore }}
            </div>
        </div>
    </div>
</template>

<script>
import DeleteItemBtn from "./DeleteItemBtn";

export default {
    data() {
        return {
            title: this.allItems,
            items: [],
            loading: false,
            url: null,
            theEnd: false,
        }
    },

    props: ['category', 'allItems', 'deleting', 'hryvnia', 'change', 'admin', 'showMore'],

    created() {
        this.fetchItems(true)

        Event.$on('item-deleted', () => {
            this.url = null
            this.fetchItems(true)
        });
    },

    methods: {
        fetchItems(reload = false) {
            this.loading = true

            let vm = this
            let category = '/' + location.search.split('category=')[1]
            let type = '/' + location.search.split('type=')[1]
            let wholeUrl = category.replace("&type=", "/")
            let addToUrl = wholeUrl

            if (addToUrl == '/undefined') {
                addToUrl = ''
            }

            let url = this.url === null ? '/api/items' + addToUrl : this.url

            this.$axios.get(url)
                .then(res => {
                    if (res.data.links.next !== null) {
                        this.url = res.data.links.next
                    } else {
                        this.theEnd = true
                    }
                    this.items = reload ? res.data.data : this.items.concat(res.data.data)
                    this.loading = false
                })
                .catch(error => {
                    console.error(error)
                    this.loading = false
                })
        },

        changePhotoOver(index, newSrc = null) {
            if (newSrc) {
                document.getElementById('photo' + index).src = '/storage/img/small/clothes/' + newSrc
            }
        },

        showMoreItems() {
            if (!this.theEnd) {
                this.fetchItems()
            }
        },

        changePhotoOut (index, newSrc) {
            document.getElementById('photo' + index).src = '/storage/img/small/clothes/' + newSrc
        }
    },
    components: {
        DeleteItemBtn,
    },
}
</script>

<style lang="scss" scoped>
.fade {
    &-enter-active {
        transition: opacity 800ms;
    }
    &-enter {
        opacity: 0;
    }
    &-enter-to {
        opacity: 1;
    }
}
</style>
