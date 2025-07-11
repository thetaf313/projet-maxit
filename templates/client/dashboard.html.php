
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden" style='font-family: Inter, "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f0f2f4] px-10 py-3">
          <div class="flex items-center gap-4 text-[#111418]">
            <div class="size-4">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24 4H6V17.3333V30.6667H24V44H42V30.6667V17.3333H24V4Z" fill="currentColor"></path>
              </svg>
            </div>
            <h2 class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em]">MAXITSA</h2>
          </div>
          <div class="flex flex-1 justify-end gap-8">
            <div class="flex items-center gap-9">
              <a class="text-[#111418] text-sm font-medium leading-normal" href="#">Accueil</a>
              <a class="text-[#111418] text-sm font-medium leading-normal" href="#">Transferer</a>
              <a class="text-[#111418] text-sm font-medium leading-normal" href="#">Payer</a>
              <a class="text-[#111418] text-sm font-medium leading-normal" href="#">Deconnexion</a>
            </div>
            <button
              class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f0f2f4] text-[#111418] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5"
            >
              <div class="text-[#111418]" data-icon="Bell" data-size="20px" data-weight="regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M221.8,175.94C216.25,166.38,208,139.33,208,104a80,80,0,1,0-160,0c0,35.34-8.26,62.38-13.81,71.94A16,16,0,0,0,48,200H88.81a40,40,0,0,0,78.38,0H208a16,16,0,0,0,13.8-24.06ZM128,216a24,24,0,0,1-22.62-16h45.24A24,24,0,0,1,128,216ZM48,184c7.7-13.24,16-43.92,16-80a64,64,0,1,1,128,0c0,36.05,8.28,66.73,16,80Z"
                  ></path>
                </svg>
              </div>
            </button>
            <!-- <div
              class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuATBSZMGrViWghQd6XU_DX2e-4-pe9TqAgEAmlsMR1fzES-Ns54dx8z81jGF9kSSl1sBNP8n2TkfSKVxajd9EpM6LXrbAzo6y1OGDq1ZFJFQXVNrT76nYzJ7RxrfszyS9znc0J61wdpTtrQ_eKEBd2b4Ry8d4OQ70zOaQANBPONnmiGigFttjsqlEVg_uC3_wUbHsyVUJKOxmRoa1HvOmWJ41v4QrmkXXLristoUojcfVsy4kJniFqsNVtBwE_UwW-rAhHVTjJy3Z0");'
            ></div> -->
            <div
              class="bg-[#2626260f] rounded-full size-10"
              
            ></div>
          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-4"><p class="text-[#111418] tracking-light text-[32px] font-bold leading-tight min-w-72">Portefeuille</p></div>
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2">
              <div class="text-[#111418] flex items-center justify-center rounded-lg bg-[#f0f2f4] shrink-0 size-12" data-icon="Wallet" data-size="24px" data-weight="regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M216,72H56a8,8,0,0,1,0-16H192a8,8,0,0,0,0-16H56A24,24,0,0,0,32,64V192a24,24,0,0,0,24,24H216a16,16,0,0,0,16-16V88A16,16,0,0,0,216,72Zm0,128H56a8,8,0,0,1-8-8V86.63A23.84,23.84,0,0,0,56,88H216Zm-48-60a12,12,0,1,1,12,12A12,12,0,0,1,168,140Z"
                  ></path>
                </svg>
              </div>
              <div class="flex flex-col justify-center">
                <p class="text-[#111418] text-base font-medium leading-normal line-clamp-1">100 000 FCFA</p>
                <p class="text-[#637588] text-sm font-normal leading-normal line-clamp-2">Solde disponible</p>
              </div>
            </div>
            <div class="flex px-4 py-3 justify-start">
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-bold leading-normal tracking-[0.015em]"
              >
                <span class="truncate">Ajouter un compte secondaire</span>
              </button>
            </div>
            <h2 class="text-[#111418] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Transactions récentes</h2>
            <!-- <div class="px-4 py-3">
              <label class="flex flex-col min-w-40 h-12 w-full">
                <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                  <div
                    class="text-[#637588] flex border-none bg-[#f0f2f4] items-center justify-center pl-4 rounded-l-lg border-r-0"
                    data-icon="MagnifyingGlass"
                    data-size="24px"
                    data-weight="regular"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"
                      ></path>
                    </svg>
                  </div>
                  <input
                    placeholder="Rechercher par date ou type"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-full placeholder:text-[#637588] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                    value=""
                  />
                </div>
              </label>
            </div> -->
            <div class="px-4 py-3 @container">
              <div class="flex overflow-hidden rounded-lg border border-[#dce0e5] bg-white">
                <table class="flex-1">
                  <thead>
                    <tr class="bg-white">
                      <th class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-120 px-4 py-3 text-left text-[#111418] w-[400px] text-sm font-medium leading-normal">Type</th>
                      <th class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-240 px-4 py-3 text-left text-[#111418] w-[400px] text-sm font-medium leading-normal">Date</th>
                      <th class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-360 px-4 py-3 text-left text-[#111418] w-[400px] text-sm font-medium leading-normal">Montant</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border-t border-t-[#dce0e5]">
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-120 h-[72px] px-4 py-2 w-[400px] text-[#111418] text-sm font-normal leading-normal">
                        Transfert
                      </td>
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-240 h-[72px] px-4 py-2 w-[400px] text-[#637588] text-sm font-normal leading-normal">
                        15 mai 2024
                      </td>
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-360 h-[72px] px-4 py-2 w-[400px] text-[#637588] text-sm font-normal leading-normal">-10 000 FCFA</td>
                    </tr>
                    <tr class="border-t border-t-[#dce0e5]">
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-120 h-[72px] px-4 py-2 w-[400px] text-[#111418] text-sm font-normal leading-normal">Paiement</td>
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-240 h-[72px] px-4 py-2 w-[400px] text-[#637588] text-sm font-normal leading-normal">
                        14 mai 2024
                      </td>
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-360 h-[72px] px-4 py-2 w-[400px] text-[#637588] text-sm font-normal leading-normal">-2500 FCFA</td>
                    </tr>
                    <tr class="border-t border-t-[#dce0e5]">
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-120 h-[72px] px-4 py-2 w-[400px] text-[#111418] text-sm font-normal leading-normal">Dépôt</td>
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-240 h-[72px] px-4 py-2 w-[400px] text-[#637588] text-sm font-normal leading-normal">
                        12 mai 2024
                      </td>
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-360 h-[72px] px-4 py-2 w-[400px] text-[#637588] text-sm font-normal leading-normal">
                        +1000 FCFA
                      </td>
                    </tr>
                    <tr class="border-t border-t-[#dce0e5]">
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-120 h-[72px] px-4 py-2 w-[400px] text-[#111418] text-sm font-normal leading-normal">
                        Transfert
                      </td>
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-240 h-[72px] px-4 py-2 w-[400px] text-[#637588] text-sm font-normal leading-normal">
                        10 mai 2024
                      </td>
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-360 h-[72px] px-4 py-2 w-[400px] text-[#637588] text-sm font-normal leading-normal">-750 CFA</td>
                    </tr>
                    <tr class="border-t border-t-[#dce0e5]">
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-120 h-[72px] px-4 py-2 w-[400px] text-[#111418] text-sm font-normal leading-normal">Paiement</td>
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-240 h-[72px] px-4 py-2 w-[400px] text-[#637588] text-sm font-normal leading-normal">
                        08 mai 2024
                      </td>
                      <td class="table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-360 h-[72px] px-4 py-2 w-[400px] text-[#637588] text-sm font-normal leading-normal">-3000 FCFA</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <style>
                          @container(max-width:120px){.table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-120{display: none;}}
                @container(max-width:240px){.table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-240{display: none;}}
                @container(max-width:360px){.table-e599c269-d4d4-40c1-8156-5fc976edb7de-column-360{display: none;}}
              </style>
            </div>
            <div class="flex px-4 py-3 justify-start">
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-bold leading-normal tracking-[0.015em]"
              >
                <span class="truncate">Voir plus</span>
              </button>
            </div>
            <h2 class="text-[#111418] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Mes comptes</h2>
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2">
              <div class="text-[#111418] flex items-center justify-center rounded-lg bg-[#f0f2f4] shrink-0 size-12" data-icon="Bank" data-size="24px" data-weight="regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"
                  ></path>
                </svg>
              </div>
              <div class="flex flex-col justify-center">
                <p class="text-[#111418] text-base font-medium leading-normal line-clamp-1">Compte courant</p>
                <p class="text-[#637588] text-sm font-normal leading-normal line-clamp-2">Compte principal</p>
              </div>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <div class="flex items-center gap-4">
                <div class="text-[#111418] flex items-center justify-center rounded-lg bg-[#f0f2f4] shrink-0 size-12" data-icon="Bank" data-size="24px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"
                    ></path>
                  </svg>
                </div>
                <div class="flex flex-col justify-center">
                  <p class="text-[#111418] text-base font-medium leading-normal line-clamp-1">Compte épargne</p>
                  <p class="text-[#637588] text-sm font-normal leading-normal line-clamp-2">Compte secondaire</p>
                </div>
              </div>
              <div class="shrink-0">
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-8 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-medium leading-normal w-fit"
                >
                  <span class="truncate">Définir comme principal</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

